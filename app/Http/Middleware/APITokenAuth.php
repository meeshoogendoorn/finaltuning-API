<?php

namespace App\Http\Middleware;

use App\ApiRequest;
use App\User;
use App\UserApiInfo;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class APITokenAuth
{
    public function handle(Request $request, Closure $next)
    {

        if(empty($request->bearerToken()))
            return response()->json($this->parseError("No token provided", 401));

        if(! $this->compareTokens($request->bearerToken(), $request))
            return response()->json($this->parseError("Api token not authorized, This could be because an extra security layer or if you haven't payed the bills yet.", 401));



        return $next($request);
    }

    public function compareTokens($token, $request)
    {
        try {
            $user = User::where("api_token", "=", $token)->firstOrFail();
        }
        catch (ModelNotFoundException $e){
            return false;
        }

        if(! $user->active || ! $user->user_api_info->payment_status)
            return false;

        if(! empty($user->user_api_info->ip_address) && $user->user_api_info->ip_address != $request->ip())
            return false;

        $userpayment = UserApiInfo::where("user_id", "=", $user->id)->first();
        $requestLog = ApiRequest::where("user_id", "=", $user->id)->first();
        $requestLog->requests++;
        $requestLog->all_time_requests++;

        if($requestLog->requests >= $requestLog->max_requests && $requestLog->max_requests > 0) {
            $userpayment->payment_status = false;
            $userpayment->save();
        }

        $requestLog->save();

        return true;
    }

    public function parseError($message, $code)
    {
        return [
            "error" => [
                "status" => $code,
                "message" => $message,
            ]
        ];
    }
}

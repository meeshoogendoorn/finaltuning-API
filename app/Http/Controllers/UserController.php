<?php

namespace App\Http\Controllers;

use App\ApiRequest;
use App\User;
use App\UserApiInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view("users.show", compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("action_success", "User deleted");
    }

    public function updatePaymentStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $info = $user->user_api_info;
        if($info->payment_status === $status)
            return redirect()->route("users.index")->with("action_success", "Payment not updated because same value");
        $request_info = ApiRequest::where("user_id", "=", $user->id)->first();
        $request_info->requests = 0;
        $request_info->save();

        $info = UserApiInfo::findOrFail($info->id);
        $info->payment_status = $status;
        $info->update();
        return redirect()->route("users.index")->with("action_success", "Payment status updated");
    }

    public function updateActiveStatus($id, $status)
    {
        $user = User::findOrFail($id);
        if($user->active === $status)
            return redirect()->route("users.index")->with("action_success", "Active status not updated because same value");

        $user->active = $status;
        $user->update();
        return redirect()->route("users.index")->with("action_success", "Active status updated");
    }

    public function updateRequest(Request $request, $id)
    {
        $apiRequest = ApiRequest::where("user_id", "=", $id)->first();
        $apiRequest->max_requests = $request->max_requests;

        $api_info = UserApiInfo::where("user_id", "=", $id)->first();
        $api_info->referer_domain = $request->referer_domain;
        $api_info->ip_address = $request->ip_address;

        $apiRequest->save();
        $api_info->save();

        return redirect()->route("users.show", $id)->with("action_success", "API info updated succcesfully");
    }
}

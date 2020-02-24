<?php

namespace App\Http\Controllers;

use App\ApiRequest;
use App\Payment;
use App\User;
use App\UserApiInfo;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $payments = Payment::all();
        return view("payments.index", compact("payments"));
    }

    public function create()
    {
        $users = User::all()->pluck("name", "id");

        return view('payments.create', compact("users"));
    }

    public function store(Request $request)
    {
        $payment = new Payment($request->all());
        $payment->save();
        $user = User::findOrFail($request->user_id);
        $info = UserApiInfo::findOrFail($user->user_api_info->id);
        $api_request = ApiRequest::where("user_id", "=", $user->id);
        $api_request->requests = 0;
        $api_request->save();
        $info->payment_status = 1;
        $info->save();
        return redirect()->route("payments.index")->with("action_success", "payment saved successfully");
    }
}

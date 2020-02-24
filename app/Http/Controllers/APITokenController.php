<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class APITokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $token = auth()->user()->api_token;
        return view("token.show", compact("token"));
    }

    public function create(){
        return view("token.create");
    }

    public function update()
    {
        $token = Str::random(60);

        auth()->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return redirect()->route("token.show");
    }
}

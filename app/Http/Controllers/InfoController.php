<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function getInfo()
    {
        $manufacturers = Car::distinct("manufacturer")
            ->pluck("manufacturer");

        return view("tuners.info", compact("manufacturers"));
    }
}

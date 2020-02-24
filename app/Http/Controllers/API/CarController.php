<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Support\Facades\DB;

class CarController extends BaseController
{
    public function index()
    {
        $manufacturers = Car::distinct("manufacturer")
            ->pluck("manufacturer");

        return $this->sendResponse($manufacturers, "Successfully indexed manufacturers");
    }
}

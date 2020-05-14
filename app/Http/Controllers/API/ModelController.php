<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Http\Request;

class ModelController extends BaseController
{
    public function index($manufacturer)
    {
        $models = Car::distinct("model")
            ->where("manufacturer", "=", $manufacturer)
            ->pluck("model");

        return $this->sendResponse($models, "Successfully indexed models from ${manufacturer}");
    }
}

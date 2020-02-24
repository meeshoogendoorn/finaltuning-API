<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Http\Request;

class ModelController extends BaseController
{
    public function index($manufacturer)
    {
        $models = Car::distinct("model001")
            ->where("manufacturer", "=", $manufacturer)
            ->pluck("model001");

        return $this->sendResponse($models, "Successfully indexed models from ${manufacturer}");
    }
}

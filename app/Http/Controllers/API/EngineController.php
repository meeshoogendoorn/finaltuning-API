<?php

namespace App\Http\Controllers\API;

use App\Car;

class EngineController extends BaseController
{
    public function index($id)
    {
        $car = Car::findOrFail($id);
        $engineTypes = Car::distinct("engine_type")
            ->where("manufacturer", "=", $car->manufacturer)
            ->where("model", "=", $car->model)
            ->where("generation", "=", $car->generation)
            ->get();

        $result = [];
        foreach($engineTypes->unique("engine_type") as $engine)
            array_push($result, ["engine" => $engine->engine_type, "result_id" => $engine->id]);

        return $this->sendResponse($result, "Successfully retrieved engine types");
    }
}

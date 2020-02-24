<?php

namespace App\Http\Controllers\API;

use App\Car;

class EngineController extends BaseController
{
    public function index($id)
    {
        $car = Car::findOrFail($id);
        $engineTypes = Car::distinct("engine_type001")
            ->where("manufacturer", "=", $car->manufacturer)
            ->where("model001", "=", $car->model001)
            ->where("generation001", "=", $car->generation001)
            ->get();

        $result = [];
        foreach($engineTypes->unique("engine_type001") as $engine)
            array_push($result, ["engine" => $engine->engine_type001, "result_id" => $engine->id]);

        return $this->sendResponse($result, "Successfully retrieved engine types");
    }
}

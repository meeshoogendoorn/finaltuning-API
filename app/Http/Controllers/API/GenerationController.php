<?php

namespace App\Http\Controllers\API;

use App\Car;

class GenerationController extends BaseController
{
    public function index($manufacturer, $model)
    {
        $generations = Car::distinct("generation")
            ->where("manufacturer", "=", $manufacturer)
            ->where("model", "=", $model)
            ->get();

        $result = [];
        foreach($generations as $generation)
            array_push($result, [$generation->id => $generation->generation]);


        return $this->sendResponse($result, "Successfully retrieved generations from the ${manufacturer} ${model}");
    }
}

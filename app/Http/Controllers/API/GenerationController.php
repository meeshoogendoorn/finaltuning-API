<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Support\Facades\DB;

class GenerationController extends BaseController
{
    public function index($manufacturer, $model)
    {
        $generations = Car::select("generation", "id")
            ->groupBy("generation")
            ->where("manufacturer", "=", $manufacturer)
            ->where("model", "=", $model)
            ->get();

        $result = [];
        foreach($generations as $generation)
            array_push($result, [$generation->id => $generation->generation]);


        return $this->sendResponse($result, "Successfully retrieved generations from the ${manufacturer} ${model}");
    }
}

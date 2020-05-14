<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Http\Request;

class ResultController extends BaseController
{
    public function index($id)
    {
        $result = Car::findOrFail($id);

        $responseBody = [
            "manufacturer" => $result->manufacturer,
            "model" => $result->model,
            "generation" => $result->generation,
            "engine" => $result->engine_type,
            "horse_power_original" => $result->ps_normal,
            "horse_power_tuned" => $result->ps_after,
            "horse_power_difference" => $result->ps_difference,
            "horse_power_difference_percentage" => $result->ps_increase,
            "newton_meter_original" => $result->nm_normal,
            "newton_meter_tuned" => $result->nm_after,
            "newton_meter_difference" => $result->nm_difference,
            "newton_meter_difference_percentage" => $result->nm_increase,
        ];

        return $this->sendResponse($responseBody, "Successfully retrieved results");
    }

    public function getTuneInfo($id){
        $result = Car::findOrFail($id);

        return $this->sendResponse($result, "Successfully retrieved info");
    }
}

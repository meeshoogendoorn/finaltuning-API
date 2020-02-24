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
            "model" => $result->model001,
            "generation" => $result->generation001,
            "engine" => $result->engine_type001,
            "horse_power_original" => $result->ps_ori,
            "horse_power_tuned" => $result->ps_tune,
            "horse_power_difference" => $result->ps_difference,
            "horse_power_difference_percentage" => ceil(((int) $result->ps_difference / (int) $result->ps_ori) * 100),
            "newton_meter_original" => $result->nm_std,
            "newton_meter_tuned" => $result->nm_tune,
            "newton_meter_difference" => $result->nm_difference,
            "newton_meter_difference_percentage" => ceil(((int) $result->nm_difference / (int) $result->ps_ori) * 100),
            "ECU_make" => $result->ecu_make,
            "ECU_type" => $result->ecu_type,
        ];

        return $this->sendResponse($responseBody, "Successfully retrieved results");
    }

    public function getTuneInfo($id){
        $result = Car::findOrFail($id);
        $responseBody = [
            "manufacturer" => $result->manufacturer,
            "model" => $result->model001,
            "generation" => $result->generation001,
            "engine" => $result->engine_type001,
            "job_type" => $result->job_type,
            "engine_code" => $result->engine_code,
            "ktag" => $result->ktag,
            "kess" => $result->kess,
            "kess_prot" => $result->kess_prot,
            "at" => $result->at,
            "x17" => $result->x17,
            "cmd" => $result->cmd,
            "note_1" => $result->note1,
            "note_2" => $result->note2,
            "ktag_diff" => $result->ktag_diff,
            "ktag_help" => $result->ktag_help,
            "obbd_help" => $result->obbd_help,
        ];

        return $this->sendResponse($responseBody, "Successfully retrieved info");
    }
}

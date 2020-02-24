<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ["vehicle", "manufacturer", "range", "engine_type", "generation",  "generation001", "control_line", "ecu_make", "ecu_type", "ps_ori", "ps_tune", "ps_difference", "increase_ps", "nm_std", "nm_tune", "nm_difference", "nm_inc", "job_type", "engine_code", "ktag", "ktag_prot", "ktag_tsm", "kess", "kess_prot", "at", "x17", "cmd", "note1", "note2", "ktag_diff", "ktag_help", "obbd_help", "obd_loc", "obd_pic", "ecu_loc", "ecu_pic", "page_url", "model001", "engine_type001"];
}

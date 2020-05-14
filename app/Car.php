<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "latest_cars";

    protected $guarded = ["id"];
}

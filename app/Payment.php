<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ["user_id", "iban", "total_price"];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}

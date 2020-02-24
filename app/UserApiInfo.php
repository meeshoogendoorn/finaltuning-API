<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserApiInfo extends Model
{
    protected $table = "user_api_info";

    protected $fillable = ["payment_status", "referer_domain", "ip_address", "user_id"];

    public function user()
    {
        return $this->belongsTo("App\User", "id", "user_id");
    }
}

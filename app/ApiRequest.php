<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiRequest extends Model
{
    protected $fillable = ['user_id', 'max_requests', 'requests'];

    public function user()
    {
        return $this->belongsTo("App\User", "id", "user_id");
    }
}

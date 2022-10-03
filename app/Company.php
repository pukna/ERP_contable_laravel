<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        "name", "is_active"
    ];
    public function user()
    {
        return $this->hasMany('App/User');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable =[
        "cod_bank", "name_bank", "is_active"
    ];
    public function supplier()
    {
        return $this->hasMany('App/Supplier');

    }
}

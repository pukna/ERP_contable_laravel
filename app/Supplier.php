<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable =[

        "name", "image", "company_name","type", "vat_number",
        "email", "phone_number", "address", "city",
        "state", "postal_code", "country", "bank",
        "bank_type", "account_number", "name_owner", "ruc_ced", "is_active"

    ];

    public function product()
    {
    	return $this->hasMany('App/Product');

    }
    public function bank()
    {
        return $this->belongsTo('App/bank');

    }
}

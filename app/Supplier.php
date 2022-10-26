<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable =[

        "name", "image", "company_name","type", "vat_number",
        "locate","email", "phone_number", "address", "city",
        "special_taxpayer", "contact_name", "contact_email", "way_payment",
        "payment_deadline","state", "postal_code", "country", "bank_id",
        "bank_type", "account_number", "name_owner", "ruc_ced", "is_active"

    ];

    public function product()
    {
    	return $this->hasMany('App/Product');

    }
    public function bank()
    {
        return $this->belongsTo('App/Bank');

    }
}

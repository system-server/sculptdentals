<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialConcept extends Model
{

	protected $fillable =['name','description','price','service_id','customer_id'];

    public function customer(){
    	return $this->belongsTo(Customer::class);
    }

    public function special_payments(){
    	return $this->hasMany(SpecialPayment::class);
    }
}

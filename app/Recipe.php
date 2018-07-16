<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [ 'name', 'date', 'recipe', 'customer_id', 'doctor_id', 'area_id' ];

    public function customer(){
    	return $this->belongsTo(Customer::class);
    }

    public function doctor(){
    	return $this->belongsTo(Doctor::class);
    }
}

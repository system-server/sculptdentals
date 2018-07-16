<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//add
use App\Customer;

class Service extends Model
{
    protected $fillable = ['name','price','description'];

    /*public function treatment(){
    	return $this->belongsTo(Customer::class);
    }*/

}

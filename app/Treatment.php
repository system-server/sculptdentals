<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Treatment;
use App\Customer;
use App\Service;
use App\Doctor;

class Treatment extends Model
{
	//salvar datos de maner masiva - formulario en forma de array
    protected $fillable =['id','diagnostic','observations','price','service_id','doctor_id','assistant_name'];

	public function customers(){
		return $this->belongsToMany(Customer::class);
	}

	public function service(){
		return $this->belongsTo(Service::class);
	}

	public function doctor(){
		return $this->belongsTo(Doctor::class);
	}

}

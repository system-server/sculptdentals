<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageConcept extends Model
{

	protected $fillable =['name','description','price','package_id'];

	public function package(){
		return $this->belongsTo(Package::class);
	}

	public function customers(){
		return $this->belongsToMany(Customer::class)->orderBy('updated_at','DESC');
	}

	public function package_payments(){
		return $this->hasMany(PackagePayment::class)->orderBy('updated_at','DESC');
	}
}

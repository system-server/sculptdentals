<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	//salvar datos de maner masiva - formulario en forma de array
    protected $fillable =['name','description','price','created_at','updated_at'];

	/*public function customers(){
		return $this->belongsToMany(Customer::class)->orderBy('updated_at','DESC');
	}*/
	public function package_concept(){
		return $this->hasOne(PackageConcept::class)->orderBy('updated_at','DESC');
	}
}

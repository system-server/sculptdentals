<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Occupation;
use App\Quote;
use App\Treatment;

class Customer extends Model
{
	//salvar datos de maner masiva - formulario en forma de array
    protected $fillable =['name','last_name','last_name_one','last_name_two','full_name','address','references','age','cell_phone','home_phone','sex','civil_state','img_name','occupation_id','status'];

    //un cliente tiene a una ocupacion
	public function occupation(){
		return $this->belongsTo(Occupation::class);
	}

	public function quotes(){
		return $this->hasMany(Quote::class);
	}

	public function recipes(){
		return $this->hasMany(Recipe::class)->orderBy('updated_at','DESC');
	}

	public function treatments(){
		return $this->belongsToMany(Treatment::class)->orderBy('updated_at','DESC');
	}

	/*public function packages(){
		return $this->belongsToMany(Package::class)->orderBy('updated_at','DESC');
	}*/

    public function special_concepts(){
    	return $this->hasMany(SpecialConcept::class);
    }	

	public function package_concepts(){
		return $this->belongsToMany(PackageConcept::class)->orderBy('updated_at','DESC');
	}    

}

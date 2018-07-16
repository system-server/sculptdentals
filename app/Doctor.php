<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable =['name','last_name_one','last_name_two','full_name','speciality','professional_card','university','sex','cell_phone','home_phone','img_name','status'];

    public function quotes(){
    	return $this->hasMany(Quote::class)->orderBy('hour','ASC');
    }

    public function recipes(){
    	return $this->hasMany(Recipe::class);
    }
}

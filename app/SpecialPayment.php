<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialPayment extends Model
{

	protected $fillable =['amount','description','special_concept_id'];

    public function special_concept(){
    	return $this->belongsTo(SpecialConcept::class);
    }
}

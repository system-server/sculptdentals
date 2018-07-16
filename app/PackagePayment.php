<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePayment extends Model
{
	public $table = "package_payments";

	protected $fillable =['amount','description','package_concept_id'];

	public function package_concept(){
		return $this->belongsTo(PackageConcept::class);
	}
}

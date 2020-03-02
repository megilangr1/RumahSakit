<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
  protected $guarded = [
		'id'
	];

	public function dokter()
	{
		return $this->hasOne('App\Doctor', 'id', 'doctor_id');
	}

	public function pasien()
	{
		return $this->hasOne('App\Patient', 'id', 'patient_id');
	}

	public function diagnosa()
	{
		return $this->hasMany('App\Diagnosis');
	}
}

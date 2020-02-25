<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
  protected $guarded = [
		'id'
	];

	public function pasien()
	{
		return $this->hasOne('App\Patient', 'id', 'patient_id');
	}

	public function dokter()
	{
		return $this->hasOne('App\Doctor', 'id', 'doctor_id');
	}

	public function service()
	{
		return $this->hasOne('App\Service', 'id', 'service_id');
	}
}

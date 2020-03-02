<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
  protected $guarded = [
		'id'
	];

	public function checkup()
	{
		return $this->belongsTo('App\CheckUp');
	}
}

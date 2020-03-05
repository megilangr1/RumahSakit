<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
  protected $guarded = [
		'id'
	];

	public function checkup()
	{
		return $this->belongsTo('App\CheckUp');
	}
}

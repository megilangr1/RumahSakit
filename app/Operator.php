<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
  protected $guarded = [
		'id'
	];

	public function login()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected $fillable = [
		'user_id', 'name', 'date_of_birth', 'phone', 'address', 'photo'
	];

	public function login()
	{
		return $this->hasOne('App\User'); 
	}
}

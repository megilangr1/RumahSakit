<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'nik', 'name', 'date_of_birth', 'phone', 'address', 'photo'
		];
		
		public function login()
    {
        return $this->hasOne('App\User', 'id');
		}

		public function regist()
		{
			return $this->belongsTo('App\Registration');
		}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'nip',
        'name',
        'service_id',
        'date_of_birth',
        'phone',
        'address',
        'photo'
    ];

    public $timestamp = true;

    public function login()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function service()
    {
        return $this->hasOne('App\Service', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primarKey = 'id';
    protected $fillable = [
        'user_id',
        'nip',
        'name',
        'service',
        'date_of_birth',
        'phone',
        'address',
        'photo'
    ];

    public $timestamp = true;
}

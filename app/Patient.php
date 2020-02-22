<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'nik', 'name', 'date_of_birth', 'phone', 'address', 'photo'
    ];
}

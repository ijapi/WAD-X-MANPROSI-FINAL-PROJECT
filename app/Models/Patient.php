<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patient";

    protected $fillable = [
        'patient_name',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'address',
        'id_card',
        'username',
        'password',
    ];
}

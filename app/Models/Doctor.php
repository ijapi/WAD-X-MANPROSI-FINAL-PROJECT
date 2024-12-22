<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";

    protected $fillable = [
        'name',
        'email',
        'working_hours',
        'password',
        'specialization_id',
        'phone',
        'license_number',
    ];

    /**
     * Define a relationship to the specialization.
     * Assuming there's a Specialization model and specializations table.
     */
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
}
}
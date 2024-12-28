<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    // Allow mass assignment for the name attribute
    protected $fillable = ['name'];

    /**
     * Define a many-to-many relationship with Specialization.
     */
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_symptom');
    }
}

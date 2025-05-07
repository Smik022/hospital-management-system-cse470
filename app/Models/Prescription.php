<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    // Add the fillable property to specify which fields can be mass-assigned
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'prescription_text',
        'date',
    ];

    // Define relationships
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

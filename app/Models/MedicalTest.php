<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MedicalTest extends Model
{
    use HasFactory;


    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'patient_name',
        'phone_number',
        'test_name',
        'test_date',
        'test_time',
    ];
}

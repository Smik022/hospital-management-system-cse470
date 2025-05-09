<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'contact_number',
        'availability',
    ];
    public function prescriptions()
{
    return $this->hasMany(Prescription::class);
}

}

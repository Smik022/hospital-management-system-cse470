<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialization', 'contact_number', 'availability'];

    // Define the relationship to the Department model
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

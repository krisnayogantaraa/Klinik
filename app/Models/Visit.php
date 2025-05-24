<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'tanggal_kunjungan',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function checkup()
    {
        return $this->hasOne(Checkup::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }
}

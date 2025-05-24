<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'dokter_id',
        'keluhan',
        'diagnosa',
    ];

    public function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}

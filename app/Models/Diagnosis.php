<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkup_id',
        'dokter_id',
        'keluhan',
        'diagnosa',
    ];

    // Relasi ke Checkup
    public function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }

    // Relasi ke User (Dokter)
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}
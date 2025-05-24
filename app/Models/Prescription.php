<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnosis_id',
        'medicine_id',
        'jumlah',
        'aturan_pakai',
    ];

    // Relasi ke Diagnosis
    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    // Relasi ke Medicine
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
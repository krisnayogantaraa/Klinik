<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'perawat_id',
        'berat_badan',
        'tekanan_darah',
    ];

    // Relasi ke Visit
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    // Relasi ke User (Perawat)
    public function perawat()
    {
        return $this->belongsTo(User::class, 'perawat_id');
    }
}
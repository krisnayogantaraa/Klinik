<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'medicine_id',
        'jumlah',
        'aturan_pakai',
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

}
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

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }

    public function perawat()
    {
        return $this->belongsTo(User::class, 'perawat_id');
    }
}

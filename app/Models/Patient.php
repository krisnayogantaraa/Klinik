<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tanggal_lahir', 'jenis_kelamin', 'no_hp'];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}

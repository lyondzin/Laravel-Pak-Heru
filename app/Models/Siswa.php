<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kelas_id', 'jurusan_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
       public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}



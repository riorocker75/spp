<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function waliKelas()
    {
        return $this->belongsToMany(Teacher::class, 'wali_kelas', 'kelas_id', 'teacher_id');
    }
}

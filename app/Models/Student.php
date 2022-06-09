<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function masterClass()
    {
        return $this->belongsTo(MasterClass::class, 'master_class_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'student_id');
    }

    public function scopeSearchNis($q, $nis)
    {
        $q->where('nis', 'like', '%'.$nis.'%');
    }
}

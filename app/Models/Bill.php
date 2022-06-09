<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public static function getBillInfo($bill){
        $newBill = new self;
        $newBill->status = optional($bill)->paid_at ? 'Sudah' : 'Belum';
        $newBill->attachment = optional($bill)->attachment ? 'Uploaded' : 'Not Uploaded';
        return $newBill;
    }
}

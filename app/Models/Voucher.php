<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ["customer","phone","voucher_number","total","tax","net_total","user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher_records()
    {
        return $this->hasMany(VoucherRecord::class);
    }
}

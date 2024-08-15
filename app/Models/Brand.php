<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ["name", "company", "information", "user_id", "photo", "agent", "phone"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function voucherRecords()
    {
        return $this->hasManyThrough(VoucherRecord::class, Product::class);
    }
}

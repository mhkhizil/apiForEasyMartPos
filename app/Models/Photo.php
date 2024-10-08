<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ["url","name",'ext',"user_id","file_size"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

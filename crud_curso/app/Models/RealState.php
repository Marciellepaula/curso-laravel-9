<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);  // se fosse outro campo passaria ele aqui
    }

    public function realstatephoto()
    {
        return $this->hasMany(RealStatePhoto::class);
    }
}

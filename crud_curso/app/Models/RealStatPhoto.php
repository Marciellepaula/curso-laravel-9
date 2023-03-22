<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealStatPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos',
        'is_tumb'
    ];

    public function realState()
    {
        return $this->belongsTo(RealState::class);
    }
}

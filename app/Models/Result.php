<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['results'];
    
    protected $casts = [
        'results'=>'array',
    ];

    use HasFactory;
}

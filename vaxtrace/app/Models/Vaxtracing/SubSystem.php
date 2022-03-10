<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}

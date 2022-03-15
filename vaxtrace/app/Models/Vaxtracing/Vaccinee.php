<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinee extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccinee_code',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birth_date',
    ];
}

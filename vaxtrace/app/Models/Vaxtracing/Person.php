<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birth_date',
        'sex',
        'contact_number',
        'region',
        'province',
        'city',
        'barangay',
        'home_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
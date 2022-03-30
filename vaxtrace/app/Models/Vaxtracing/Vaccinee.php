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

    public function transactions(){
        return $this->hasMany(Transactions::class, 'vaccinees_id');
    }

    public function full_name(){
        return "{$this->first_name} {$this->last_name}";
    }
}

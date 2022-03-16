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
        return $this->belongsToMany(Category_has_Sub_Category::class,'vaccinees_has_transactions', 'vaccinees_id', 'category_has_sub_category_id');
    }
}

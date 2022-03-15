<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;

    protected $table = 'Sub_Categories';

    protected $fillable = [
        'sub_cat_name',
        'sub_cat_description',
        'status',
    ];
}

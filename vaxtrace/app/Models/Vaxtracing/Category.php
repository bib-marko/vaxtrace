<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
        'cat_description',
        'status',
    ];

    public function sub_categories(){
        return $this->belongsToMany('App\Models\Vaxtracing\Sub_Category', 'category_has_sub_category',  'categories_id', 'sub_categories_id');
    }
}

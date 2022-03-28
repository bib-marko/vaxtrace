<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Category_has_Sub_Category extends Pivot
{
    protected $table = 'category_has_sub_category';

    // The Player this Party belongs to.
    public function category() {
        
        return $this->belongsToMany(Category::class, 'category_has_sub_category', 'id', 'categories_id');
    }

    public function sub_category() {
        return $this->belongsToMany(Sub_Category::class, 'category_has_sub_category', 'id', 'sub_categories_id');
    }
}

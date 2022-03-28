<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $table = 'transaction_has_summary';

    protected $fillable = [
        'category_has_sub_category_id ',
        'vaccinees_transaction_id ',
        'trans_details ',
        'trans_status ',
        'assist_by ',
    ];

    public function status_report() {
        return $this->belongsToMany(Category_has_Sub_Category::class, 'transaction_has_summary','id', 'category_has_sub_category_id');
    }
}

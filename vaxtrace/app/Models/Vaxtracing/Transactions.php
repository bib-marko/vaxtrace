<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Transactions extends Pivot
{
    protected $table = 'vaccinees_has_transactions';

    // The Player this Party belongs to.
    public function vaccinees() {
        return $this->belongsTo(Vaccinee::class, 'vaccinees_id', 'id');
    }

    public function status_report() {
        return $this->belongsTo(Category_has_Sub_Category::class, 'id');
    }
}

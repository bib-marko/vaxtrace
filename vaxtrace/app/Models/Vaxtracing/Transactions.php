<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Transactions extends Pivot
{
    protected $table = 'vaccinees_has_transactions';
    
    // The Player this Party belongs to.
    public function summary() {
        return $this->hasMany(Summary::class, 'vaccinees_transaction_id');
    }


}

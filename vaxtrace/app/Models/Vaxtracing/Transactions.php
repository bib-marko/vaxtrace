<?php

namespace App\Models\Vaxtracing;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Transactions extends Pivot
{
    protected $table = 'vaccinees_has_transactions';
    
    // The Player this Party belongs to.
    public function summary() {
        return $this->hasMany(Summary::class, 'vaccinees_transaction_id');
    }

    public function vaccinee() {
        return $this->belongsToMany(Vaccinee::class, 'vaccinees_has_transactions','id', 'vaccinees_id')->select('*', DB::raw("CONCAT(first_name , ' ' , middle_name , ' ' , last_name, ' ' , suffix) as full_name"));;
    }

}

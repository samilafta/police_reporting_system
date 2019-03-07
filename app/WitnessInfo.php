<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WitnessInfo extends Model
{

    protected $fillable = [
        'case_detail_id',
        'full_name',
        'phone_number',
//        'home_address',
//        'city_id',
//        'witness_story',
    ];

    public function case_detail() {
        return $this->belongsTo(CaseDetail::class);
    }

}

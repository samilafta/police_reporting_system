<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplainantInfo extends Model
{

    protected $fillable = [
        'c_full_name',
        'c_age',
        'c_gender',
        'c_occupation',
        'case_detail_id'
    ];


    public function case_detail() {
        $this->belongsTo(CaseDetail::class);
    }

    public function address() {
        $this->hasOne(ComplainantAddress::class);
    }


}

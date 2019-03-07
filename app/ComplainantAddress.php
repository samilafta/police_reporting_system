<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplainantAddress extends Model
{

    protected $fillable = [
        'ca_phone_number',
        'ca_email',
        'ca_home_address',
        'complainant_info_id',
        'case_detail_id',
    ];

    public function complainant_info() {
        $this->belongsTo(ComplainantInfo::class);
    }

    public function case_detail() {
        $this->belongsTo(CaseDetail::class);
    }

}

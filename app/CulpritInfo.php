<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CulpritInfo extends Model
{

    protected $fillable = [
        'cu_full_name',
        'cu_gender',
        'cu_age',
        'cu_occupation',
        'cu_address',
        'case_detail_id',
    ];

    public function case_detail() {
        return $this->belongsTo(CaseDetail::class);
    }

}

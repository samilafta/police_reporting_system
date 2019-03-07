<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationDetail extends Model
{

    protected $fillable = [
        'case_detail_id',
        'investigation_desc',
    ];

    public function case_detail() {
        return $this->belongsTo(CaseDetail::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentDetails extends Model
{

    protected $fillable = [
        'incident_date',
        'incident_time',
        'incident_location',
        'incident_desc',
        'case_detail_id',
    ];

    public function case_detail() {
        return $this->belongsTo(CaseDetail::class);
    }

}

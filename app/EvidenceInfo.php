<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvidenceInfo extends Model
{

    protected $fillable = ['case_details_id', 'e_file_name'];

    public function case_detail() {
        return $this->belongsTo(CaseDetail::class);
    }

}

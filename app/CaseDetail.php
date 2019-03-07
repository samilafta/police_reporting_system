<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseDetail extends Model
{

    protected $fillable = [
        'case_number',
        'user_id',
        'investigator_id',
        'case_status'
    ];

    public function randomDigits($length){
        $digits = "";
        $prefix = "CS00";
        $numbers = range(0,99);
        shuffle($numbers);
        for($i = 0;$i < $length;$i++)
            $digits = $prefix.$numbers[$i];
        return $digits;
    }

    public function setCaseNumberAttribute()
    {
        $this->attributes['case_number'] = $this->randomDigits(2);
    }

    public function complainant() {
        return $this->hasOne(ComplainantInfo::class);
    }

    public function c_address() {
        return $this->hasOne(ComplainantAddress::class);
    }

    public function incident() {
        return $this->hasOne(IncidentDetails::class);
    }

    public function witness() {
        return $this->hasOne(WitnessInfo::class);
    }

    public function evidence() {
        return $this->hasOne(EvidenceInfo::class);
    }

    public function investigation() {
        return $this->hasOne(InvestigationDetail::class);
    }

    public function culprit() {
        return $this->hasOne(CulpritInfo::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function assigned_user() {
        return $this->belongsTo(User::class, 'investigator_id');
    }

}

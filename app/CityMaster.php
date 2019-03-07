<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityMaster extends Model
{

    public function region()
    {
        return $this->belongsTo(RegionMaster::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionMaster extends Model
{
    public function city()
    {
        return $this->hasOne(CityMaster::class);
    }
}

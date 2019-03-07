<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['user_id', 'avatar', 'full_name', 'phone_number', 'rank_id', 'badge_number'];

    public function  user() {
        return $this->belongsTo('App\User');
    }

    public function rank()
    {
        return $this->hasOne(PoliceRank::class);
    }

}

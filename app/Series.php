<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function active_users() {
        return $this->belongsToMany(User::class);
    }

}

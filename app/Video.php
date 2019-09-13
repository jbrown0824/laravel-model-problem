<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function users_watched() {
        return $this->belongsToMany(User::class);
    }
}

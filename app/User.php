<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function current_series() {
        return $this->belongsTo(Series::class);
    }

    public function videos_watched() {
        return $this->belongsToMany(Video::class)->withPivot([ 'completed_watching' ]);
    }
}

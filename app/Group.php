<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function book() {
        return $this->hasMany('\App\Book');
    }

    public function ballot() {
        return $this->hasMany('\App\Ballot');
    }

    public function meeting() {
        return $this->hasMany('\App\Meeting');
    }

    public function users() {
        return $this->belongsToMany('\App\User', 'user_group');
    }

}

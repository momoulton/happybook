<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    public function meeting() {
        # Ballot belongs to a Meeting.
        # Define an inverse one-to-one relationship.
        return $this->belongsTo('\App\Meeting');
    }

    public function books() {
      #Ballots and Books have Many to Many relationship
      return $this->belongsToMany('\App\Book');
    }

    # Votes belong to a ballot. One to Many.
    public function votes() {
      return $this->hasMany('\App\Vote');
    }

    public function user() {
      return $this->belongsTo('\App\User');
    }

    public function group() {
      return $this->belongsTo('\App\Group');
    }

}

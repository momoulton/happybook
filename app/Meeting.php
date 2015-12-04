<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public function book() {
        # Meeting belongs to a Book.
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Book');
    }

    public function ballot() {
      # Meeting has one Ballot
      # Define a one-to-one relationship.
      return $this->hasOne('\App\Ballot');
    }
}

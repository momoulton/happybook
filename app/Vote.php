<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    # Votes belong to a single ballot. Inverse one-to-many
    public function ballot() {
      return $this->belongsTo('\App\Ballot');
    }
}

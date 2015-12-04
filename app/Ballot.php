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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function meeting() {
      # Book has many Meetings
      # Define a one-to-many relationship.
      return $this->hasMany('\App\Meeting');
    }
}

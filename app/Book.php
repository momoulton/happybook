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

    public function ballots() {
      #Books have Many to Many Relationship with Ballots
      return $this->belongsToMany('\App\Ballot')->withTimeStamps();
    }

    public function getBooksForMenu() {
        $user = \Auth::user();
        $group_id = $user->group_id;
        $books = $this->where('group_id','=',$group_id)->orderBy('year','ASC')->get();
        $booksForMenu = [];
        foreach($books as $book) {
            $booksForMenu[$book['id']] = $book;
        }
        return $booksForMenu;
    }

    public function user() {
      return $this->belongsTo('\App\User');
    }

    public function group() {
      return $this->belongsTo('\App\Group');
    }
}

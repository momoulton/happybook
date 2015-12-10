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
        $books = $this->orderBy('year','ASC')->get();
        $booksForMenu = [];
        foreach($books as $book) {
            $booksForMenu[$book['id']] = $book;
        }
        return $booksForMenu;
    }
}

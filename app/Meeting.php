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

    public function getMeetingsForMenu() {
        $user = \Auth::user();
        $group_id = $user->group_id;
        $meetings = $this->where('group_id','=',$group_id)->orderBy('meeting_date','ASC')->get();
        $meetingsForMenu = [];
        foreach($meetings as $meeting) {
            $meetingsForMenu[$meeting['id']] = $meeting;
        }
        return $meetingsForMenu;
    }

    public function user() {
      return $this->belongsTo('\App\User');
    }

    public function group() {
      return $this->belongsTo('\App\Group');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BallotController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /ballots
    */
    public function getIndex() {
        $user = \Auth::user();
        $group_id = $user->group_id;
        if ($group_id === NULL) {
          \Session::flash('flash_message','Join a group first to see its ballots.');
          return redirect('/groups');
        }
        $group = \App\Group::find($group_id);
        $ballots = \App\Ballot::with('meeting')->with('books')->where('group_id',$user->group_id)->orderBy('id','DESC')->get();
        return view('ballots.index')->with('ballots',$ballots)->with('group',$group);
    }

    /**
     * Responds to requests to GET /ballots/create
     */
    public function getCreate() {
      $meetingModel = new \App\Meeting();
      $meetings_for_menu = $meetingModel->getMeetingsForMenu();

      $bookModel = new \App\Book();
      $books_for_checkbox = $bookModel->getBooksForMenu();

      if (\Auth::user()->group_id === NULL) {
        \Session::flash('flash_message','Please join a group before adding ballots.');
        return redirect('/ballots');
      }
      elseif (sizeOf($meetings_for_menu) === 0) {
        \Session::flash('flash_message','There are no meetings associated with your group. Add one before creating a ballot.');
        return redirect('/ballots');
      }
      elseif (sizeOf($books_for_checkbox) === 0) {
        \Session::flash('flash_message','There are no books associated with your group. Add some before creating a ballot.');
        return redirect('/ballots');
      }
      else {
        return view('ballots.create')
          ->with('meetings_for_menu',$meetings_for_menu)
          ->with('books_for_checkbox',$books_for_checkbox);
        }
    }

    /**
     * Responds to requests to POST /ballots/create
     */
    public function postCreate(Request $request) {
        $this->validate(
          $request,
          [
              'meeting' => 'required',
              'books' => 'required',
          ]
        );
        if($request->books) {
            $books = $request->books;
        }
        else {
            $books = [];
        }
        if (sizeOf($books) > 7) {
          \Session::flash('flash_message','You may only put up to seven books on a ballot. Please try again.');
          return back();
        }
        elseif (sizeOf($books) < 2) {
          \Session::flash('flash_message','You must put at least two books on a ballot. Please try again.');
          return back();
        }
        else {
          $ballot = new \App\Ballot();
          $ballot->meeting_id = $request->meeting;
          $ballot->user_id = \Auth::user()->id;
          $ballot->group_id = \Auth::user()->group_id;
          $ballot->save();
          $ballot->books()->sync($books);
          \Session::flash('flash_message','Your ballot was created!');
          return redirect('/ballots');
        }
    }

    /**
     * Responds to requests to GET /ballots/edit/{id}
     */
    public function getEdit($id) {
        $ballot = \App\Ballot::with('books')->with('meeting')->find($id);
        $user = \Auth::user();
        if(is_null($ballot)) {
            \Session::flash('flash_message','Ballot not found.');
            return redirect('\ballots');
        }
        elseif($ballot->group_id !== $user->group_id)
        {
          \Session::flash('flash_message','Ballot not found in your group.');
          return redirect('/ballots');
        }
        else {
          $meetingModel = new \App\Meeting();
          $meetings_for_menu = $meetingModel->getMeetingsForMenu();

          $bookModel = new \App\Book();
          $books_for_checkbox = $bookModel->getBooksForMenu();

          $books_for_ballot = [];
          foreach($ballot->books as $book) {
            $books_for_ballot[] = $book->id;
          }

          return view('ballots.edit')
            ->with([
              'ballot' => $ballot,
              'meetings_for_menu' => $meetings_for_menu,
              'books_for_checkbox' => $books_for_checkbox,
              'books_for_ballot' => $books_for_ballot,
            ]);
          }
    }

    /**
     * Responds to requests to POST /ballots/edit/{id}
     */
    public function postEdit(Request $request) {
        $this->validate(
          $request,
          [
              'meeting' => 'required',
              'books' => 'required',
          ]
        );
        if($request->books) {
            $books = $request->books;
        }
        else {
            $books = [];
        }
        if (sizeOf($books) > 7) {
          \Session::flash('flash_message','You may only put up to seven books on a ballot. Please try again.');
          return back();
        }
        elseif (sizeOf($books) < 2) {
          \Session::flash('flash_message','You must put at least two books on a ballot. Please try again.');
          return back();
        }
        else {
          $ballot = \App\Ballot::find($request->id);
          $ballot->meeting_id = $request->meeting;
          $ballot->user_id = \Auth::user()->id;
          $ballot->group_id = \Auth::user()->group_id;
          $ballot->save();
          $ballot->books()->sync($books);
          \Session::flash('flash_message','Your ballot was updated!');
          return redirect('/ballots');
        }
    }

    /**
     * Responds to requests to GET /ballots/delete/{id}
     */
    public function getDelete($id) {
        $ballot = \App\Ballot::with('meeting')->with('books')->find($id);
        $user = \Auth::user();
        if(is_null($ballot)) {
          \Session::flash('flash_message','Ballot not found.');
          return redirect('/ballots');
        }
        elseif($meeting->group_id !== $user->group_id)
        {
          \Session::flash('flash_message','Meeting not found in your group.');
          return redirect('/meetings');
        }
        else {
          return view('ballots.delete')->with('ballot',$ballot);
        }
    }

    /**
     * Responds to requests to GET /ballots/do/delete/{id}
     */
    public function getDoDelete($id) {
        $ballot = \App\Ballot::find($id);
        $user = \Auth::user();
        if(is_null($ballot)) {
          \Session::flash('flash_message','Ballot not found.');
          return redirect('/ballots');
        }
        elseif($meeting->group_id !== $user->group_id)
        {
          \Session::flash('flash_message','Meeting not found in your group.');
          return redirect('/meetings');
        }
        else {
          if($ballot->books()) {
            $ballot->books()->detach();
          }
          $ballot->delete();
          \Session::flash('flash_message','Ballot was deleted.');
          return redirect('/ballots');
        }
    }

    /**
     * Responds to requests to GET /ballots/vote/{id}
     */
    public function getVote($id) {
        $ballot = \App\Ballot::with('meeting')->with('books')->find($id);
        $user = \Auth::user();
        if ($ballot->group_id !== $user->group_id) {
          \Session::flash('flash_message','This ballot is not in your group. You cannot vote on it.');
          return redirect('/ballots');
        }
        $votes = $ballot->votes;
        $voters = [];
        foreach($votes as $vote) {
          array_push($voters,$vote->user_id);
        }
        if (in_array($user->id,$voters)) {
          \Session::flash('flash_message','You have already voted on this ballot.');
          return redirect('/ballots');
        }
        return view('ballots.vote')->with('ballot',$ballot);
    }

    /**
     * Responds to requests to POST /ballots/vote/{id}
     */
    public function postVote(Request $request) {

        $this->validate(
          $request,
          [
              'votes' => 'required',
          ]
        );
        $votes = $request->votes;
        $size = $request->size;
        $id = $request->id;
        $books = $request->books;
        $votes_ok = TRUE;
        for ($i = 1; $i <= $size; $i++) {
            if (!in_array($i,$votes)) {
              $votes_ok = FALSE;
            }
        }
        if (!$votes_ok) {
          \Session::flash('flash_message','Please check your votes. You must give each book a unique ranking, starting at 1.');
          return back();
        }
        else {
          $votes_with_books = [];
          for ($i = 0; $i <= $size-1; $i++) {
            $this_book = $books[$i];
            $this_rank = $votes[$i];
            $votes_with_books["$this_book"] = $this_rank;
          }
          $vote = new \App\Vote();
          $vote->ballot_id = $id;
          $vote->user_id = \Auth::id();
          foreach ($votes_with_books as $voted_book_id => $rank) {
              if ($rank === "1") {
                $vote->first_choice = $voted_book_id;
              }
              else if ($rank === "2") {
                $vote->second_choice = $voted_book_id;
              }
              else if ($rank === "3") {
                $vote->third_choice = $voted_book_id;
              }
              else if ($rank === "4") {
                $vote->fourth_choice = $voted_book_id;
              }
              else if ($rank === "5") {
                $vote->fifth_choice = $voted_book_id;
              }
              else if ($rank === "6") {
                $vote->sixth_choice = $voted_book_id;
              }
              else if ($rank === "7") {
                $vote->seventh_choice = $voted_book_id;
              }
          }
          // echo dump($votes_with_books);
          $vote->save();
          \Session::flash('flash_message','You have voted!');
          return redirect('/ballots');
        }
    }

    /**
     * Responds to requests to GET /ballots/tally/{id}
     */
    public function getTally($id) {
      $ballot = \App\Ballot::with('meeting')->with('books')->with('votes')->find($id);
      $votes = $ballot->votes;
      $number_of_votes = sizeOf($votes);
      if ($number_of_votes === 0) {
        \Session::flash('flash_message','No one has voted on this ballot yet.');
        return redirect('/ballots');
      }
      $books = $ballot->books;
      $number_of_books = sizeOf($books);
      $pref_not_used = FALSE;
      $tie = FALSE;
      $first_choices = [];
      $winner_id = null;
      $chosen_book = null;
      $done = FALSE;

      foreach ($votes as $vote) {
        array_push($first_choices,$vote["first_choice"]);
      }
      $counts = array_count_values($first_choices);
      arsort($counts);
      $count_values = array_values($counts);
      $raw_results = $counts;
      $round = 0;
      if ($number_of_books === 2) {
          $pref_not_used = TRUE;
          if ($count_values[0] > $count_values[1]) {
            $count_keys = array_keys($counts);
            $winner_id = reset($count_keys);
            $done = TRUE;
          }
          else {
            $done = TRUE;
            $tie = TRUE;
          }
      }

      while (!$done AND $round < 10) {
        $round = $round + 1;
        $count_values = array_values($counts);
        if ($count_values[0]/$number_of_votes > 0.5) {
          $count_keys = array_keys($counts);
          $winner_id = reset($count_keys);
          $done = TRUE;
        }
        else {
          //identify lowest vote getter
          asort($counts);
          $count_keys = array_keys($counts);
          $eliminate = reset($count_keys);
          //redistribute votes
          foreach ($votes as $vote) {
            if ($vote["first_choice"] === $eliminate) {
              $vote["first_choice"] = $vote["second_choice"];
              $vote["second_choice"] = $vote["third_choice"];
              $vote["third_choice"] = $vote["fourth_choice"];
              $vote["fourth_choice"] = $vote["fifth_choice"];
              $vote["fifth_choice"] = $vote["sixth_choice"];
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["second_choice"] === $eliminate) {
              $vote["second_choice"] = $vote["third_choice"];
              $vote["third_choice"] = $vote["fourth_choice"];
              $vote["fourth_choice"] = $vote["fifth_choice"];
              $vote["fifth_choice"] = $vote["sixth_choice"];
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["third_choice"] === $eliminate) {
              $vote["third_choice"] = $vote["fourth_choice"];
              $vote["fourth_choice"] = $vote["fifth_choice"];
              $vote["fifth_choice"] = $vote["sixth_choice"];
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["fourth_choice"] === $eliminate) {
              $vote["fourth_choice"] = $vote["fifth_choice"];
              $vote["fifth_choice"] = $vote["sixth_choice"];
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["fifth_choice"] === $eliminate) {
              $vote["fifth_choice"] = $vote["sixth_choice"];
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["sixth_choice"] === $eliminate) {
              $vote["sixth_choice"] = $vote["seventh_choice"];
              $vote["seventh_choice"] = null;
            }
            else if ($vote["seventh_choice"] === $eliminate) {
              $vote["seventh_choice"] = null;
            }
            $first_choices = [];
            foreach ($votes as $vote) {
              array_push($first_choices,$vote["first_choice"]);
            }
            $counts = array_count_values($first_choices);
            arsort($counts);
          }
        }
      }
      if ($winner_id !== NULL)
      {
        $chosen_book = \App\Book::find($winner_id);
      }
      // return view('ballots.tally')
      // ->with('chosen_book',$chosen_book)
      // ->with('round',$round)
      // ->with('tie',$tie)
      // ->with('pref_not_used',$pref_not_used)
      // ->with('ballot',$ballot);
    }

    public function postTally(Request $request) {
      $meeting_id = $request->meeting_id;
      $book_id = $request->book_id;
      $meeting = \App\Meeting::find($meeting_id);
      $meeting->book_id = $book_id;
      $meeting->save();
      \Session::flash('flash_message','Your choice has been recorded');
      return redirect('/meetings');
    }
}

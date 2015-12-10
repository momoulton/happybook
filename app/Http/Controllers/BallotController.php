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
        $ballots = \App\Ballot::with('meeting')->with('books')->orderBy('id','DESC')->get();
        return view('ballots.index')->with('ballots',$ballots);
    }


    /**
     * Responds to requests to GET /ballots/create
     */
    public function getCreate() {
      $meetingModel = new \App\Meeting();
      $meetings_for_menu = $meetingModel->getMeetingsForMenu();

      $bookModel = new \App\Book();
      $books_for_checkbox = $bookModel->getBooksForMenu();

      return view('ballots.create')
        ->with('meetings_for_menu',$meetings_for_menu)
        ->with('books_for_checkbox',$books_for_checkbox);
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

        $ballot = new \App\Ballot();
        $ballot->meeting_id = $request->meeting;
        $ballot->save();
        if($request->books) {
            $books = $request->books;
        }
        else {
            $books = [];
        }
        $ballot->books()->sync($books);
        \Session::flash('flash_message','Your ballot was created!');
        return redirect('/ballots');
    }

    /**
     * Responds to requests to GET /ballots/edit/{id}
     */
    public function getEdit($id) {
        $ballot = \App\Ballot::with('books')->with('meeting')->find($id);

        if(is_null($ballot)) {
            \Session::flash('flash_message','Ballot not found.');
            return redirect('\ballots');
        }

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

        $ballot = \App\Ballot::find($request->id);
        $ballot->meeting_id = $request->meeting;
        $ballot->save();
        if($request->books) {
            $books = $request->books;
        }
        else {
            $books = [];
        }
        $ballot->books()->sync($books);
        \Session::flash('flash_message','Your ballot was updated!');
        return redirect('/ballots');
    }

    /**
     * Responds to requests to GET /ballots/delete/{id}
     */
    public function getDelete($id) {
        $ballot = \App\Ballot::with('meeting')->with('books')->find($id);

        if(is_null($ballot)) {
          \Session::flash('flash_message','Ballot not found.');
          return redirect('/ballots');
        }
        return view('ballots.delete')->with('ballot',$ballot);
    }

    /**
     * Responds to requests to GET /ballots/do/delete/{id}
     */
    public function getDoDelete($id) {
        $ballot = \App\Ballot::find($id);
        if(is_null($ballot)) {
          \Session::flash('flash_message','Ballot not found.');
          return redirect('/ballots');
        }
        if($ballot->books()) {
          $ballot->books()->detach();
        }
        $ballot->delete();
        \Session::flash('flash_message','Ballot was deleted.');
        return redirect('/ballots');
    }

    /**
     * Responds to requests to GET /ballots/vote/{id}
     */
    public function getVote($id) {
        $ballot = \App\Ballot::with('meeting')->with('books')->find($id);
        return view('ballots.vote')->with('ballot',$ballot);
    }

    /**
     * Responds to requests to POST /ballots/vote/{id}
     */
    public function postVote(Request $request) {
      \Session::flash('flash_message','You have voted!');
      return redirect('/ballots');
    }

    /**
     * Responds to requests to GET /ballots/tally/{id}
     */
    public function getTally($id) {
        return 'Here are the results of this ballot '.$id;
    }
}

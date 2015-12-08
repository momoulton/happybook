<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        $books = \App\Book::orderBy('year','ASC')->get();
        return view('books.index')->with('books',$books);
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($id = null) {
        $book = \App\Book::with('ballots')->find($id);

        if(is_null($book)) {
          \Session::flash('flash_message','Book not found.');
          return redirect('/books');
        }

        return view('books.show')->with('book',$book);
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        $meetingModel = new \App\Meeting();
        $meetings_for_menu = $meetingModel->getMeetingsForMenu();
        return view('books.create')
            ->with('meetings_for_menu',$meetings_for_menu);
    }

    /**
     * Responds to requests to POST /books/create
     */
     public function postCreate(Request $request) {
         $this->validate(
             $request,
             [
                 'title' => 'required|min:1',
                 'image_link' => 'required|url',
                 'year' => 'required|min:4',
               ]
         );
         # Enter book into the database
         $book = new \App\Book();
         $book->title = $request->title;
         $book->author = $request->author;
         $book->year = $request->year;
         $book->description = $request->description;
         $book->image_link = $request->image_link;
         $book->purchase_link = $request->purchase_link;
         $book->save();
         $all_ballots = \App\Ballot::all();
         $ballots = [];
         if($request->meetings) {
            $meeting_ids = $request->meetings;
            foreach($all_ballots as $ballot) {
              foreach($meeting_ids as $meeting_id) {
                if ($ballot->meeting_id === $meeting_id) {
                  array_push($ballots, $ballot->id);
                }
              }
            }
          }
          else {
            $ballots = [];
          }
          $book->ballots()->sync($ballots);
         # Done
         \Session::flash('flash_message','Your book was added!');
         return redirect('/books');
     }

    /**
     * Responds to requests to GET /books/edit/{id}
     */
    public function getEdit($id = null) {
      $book = \App\Book::with('ballots')->find($id);

      if(is_null($book)) {
        \Session::flash('flash_message','Book not found.');
        return redirect('/books');
      }

      $meetingModel = new \App\Meeting();
      $meetings_for_menu = $meetingModel->getMeetingsForMenu();

      $meetings_for_this_book = [];
      foreach($book->ballots as $ballot) {
          $meeting_id = $ballot->meeting_id;
          $meeting = \App\Meeting::find($meeting_id);
          $meetings_for_this_book[$meeting_id] = $meeting;
      }

      return view('books.edit')
        ->with([
            'book' => $book,
            'meetings_for_menu' => $meetings_for_menu,
            'meetings_for_this_book' => $meetings_for_this_book,
        ]);
    }

    /**
     * Responds to requests to POST /books/edit/
     */
    public function postEdit(Request $request) {
      $this->validate(
          $request,
          [
              'title' => 'required|min:1',
              'image_link' => 'required|url',
              'year' => 'required|min:4',
            ]
      );
      # Enter book into the database
      $book = \App\Book::find($request->id);
      $book->title = $request->title;
      $book->author = $request->author;
      $book->year = $request->year;
      $book->description = $request->description;
      $book->image_link = $request->image_link;
      $book->purchase_link = $request->purchase_link;
      $book->save();
      $all_ballots = \App\Ballot::all();
      $ballots = [];
      if($request->meetings) {
         $meeting_ids = $request->meetings;
         foreach($all_ballots as $ballot) {
           foreach($meeting_ids as $meeting_id) {
             if ($ballot->meeting_id === $meeting_id) {
               array_push($ballots, $ballot->id);
             }
           }
         }
       }
       else {
         $ballots = [];
       }
       $book->ballots()->sync($ballots);
      # Done
      \Session::flash('flash_message',$book->title.' was edited!');
      return redirect('/books');
    }

    /**
     * Responds to requests to GET /books/delete/{id}
     */
    public function getDelete($id) {
      $book = \App\Book::find($id);

      if(is_null($book)) {
        \Session::flash('flash_message','Book not found.');
        return redirect('/books');
      }
      return view('books.delete')->with('book',$book);
    }

    /**
     * Responds to requests to GET /books/do/delete/{id}
     */
    public function getDoDelete($id) {
        $book = \App\Book::find($id);
        if(is_null($book)) {
          \Session::flash('flash_message','Book not found.');
          return redirect('/books');
        }
        if($book->ballots()) {
          $book->ballots()->detach();
        }
        $book->delete();
        \Session::flash('flash_message',$book->title.' was deleted.');
        return redirect('/books');
      }
}

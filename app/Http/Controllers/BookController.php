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
         $book->image_link = $request->image_link;
         $book->purchase_link = $request->purchase_link;
         $book->save();
         $ballots = [];
         if($request->meeting) {
            $meeting_ids = $request->meeting;
            foreach($meeting_ids as $meeting_id) {
              $ballot = \App\Ballot::find($meeting_id);
              $ballots[$meeting_id] = $ballot;
            }
          }
        $book->ballots()->sync($ballots);
         # Done
         \Session::flash('flash_message','Your book was added!');
         return redirect('/books');
     }

    /**
     * Responds to requests to GET /books/edit/{id}
     */
    public function getEdit($id) {
        return 'Edit a book '.$id;
    }

    /**
     * Responds to requests to POST /books/edit/{id}
     */
    public function postEdit($id) {
        return 'Process editing book '.$id;
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

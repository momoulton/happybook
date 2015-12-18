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
          $user = \Auth::user();
          $group_id = $user->group_id;
          if ($group_id === NULL) {
            \Session::flash('flash_message','Join a group first to see its books.');
            return redirect('/groups');
          }
          $group = \App\Group::find($group_id);
          $books = \App\Book::where('group_id',$user->group_id)->orderBy('year','ASC')->get();
          return view('books.index')->with('books',$books)->with('group',$group);
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($id = null) {
        $book = \App\Book::with('ballots')->find($id);
        $user = \Auth::user();
        if(is_null($book)) {
          \Session::flash('flash_message','Book not found.');
          return redirect('/books');
        }
        elseif($book->group_id !== $user->group_id)
        {
          \Session::flash('flash_message','Book not found.');
          return redirect('/books');
        }
        else {
          return view('books.show')->with('book',$book);
        }
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        if (\Auth::user()->group_id === NULL) {
          \Session::flash('flash_message','Please join a group before adding books.');
          return redirect('/books');
        }
        else {
          return view('books.create');
        }
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
         $book->user_id = \Auth::user()->id;
         $book->group_id = \Auth::user()->group_id;
         $book->save();
         # Done
         \Session::flash('flash_message','Your book was added!');
         return redirect('/books');
     }

    /**
     * Responds to requests to GET /books/edit/{id}
     */
    public function getEdit($id = null) {
      $book = \App\Book::find($id);
      $user = \Auth::user();
      if(is_null($book)) {
        \Session::flash('flash_message','Book not found.');
        return redirect('/books');
      }
      elseif($book->group_id !== $user->group_id)
      {
        \Session::flash('flash_message','Book not found in your group.');
        return redirect('/books');
      }
      else {
        return view('books.edit')
          ->with('book',$book);
      }
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
      $book->user_id = \Auth::user()->id;
      $book->group_id = \Auth::user()->group_id;
      $book->save();
      # Done
      \Session::flash('flash_message',$book->title.' was edited!');
      return redirect('/books');
    }

    /**
     * Responds to requests to GET /books/delete/{id}
     */
    public function getDelete($id) {
      $book = \App\Book::find($id);
      $user = \Auth::user();
      if(is_null($book)) {
        \Session::flash('flash_message','Book not found.');
        return redirect('/books');
      }
      elseif($book->group_id !== $user->group_id)
      {
        \Session::flash('flash_message','Book not found in your group.');
        return redirect('/books');
      }
      else {
        return view('books.delete')->with('book',$book);
      }
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

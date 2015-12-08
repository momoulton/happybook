<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
    public function getShow($id) {
        return 'Show book: '.$id;
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return 'Form to create a new book';
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate() {
        return 'Process adding new book';
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
        return 'Delete book? '.$id;
    }

    /**
     * Responds to requests to POST /books/delete/{id}
     */
    public function postDelete($id) {
        return 'Deleting book '.$id;
    }
}

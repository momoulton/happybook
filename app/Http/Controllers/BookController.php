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
        return 'List all the books';
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
     * Responds to requests to GET /books/edit
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
     * Responds to requests to POST /books/delete/{id}
     */
    public function postDelete($id) {
        return 'Deleting book '.$id;
    }
}

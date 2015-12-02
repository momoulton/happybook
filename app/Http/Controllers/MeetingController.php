<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MeetingController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /meetings
    */
    public function getIndex() {
        return 'List all the meetings';
    }

    /**
     * Responds to requests to GET /meetings/show/{date}
     */
    public function getShow($date) {
        return 'Show meeting: '.$date;
    }

    /**
     * Responds to requests to GET /meetings/create
     */
    public function getCreate() {
        return 'Form to create a new meeting';
    }

    /**
     * Responds to requests to POST /meetings/create
     */
    public function postCreate() {
        return 'Process adding new meeting';
    }

    /**
     * Responds to requests to GET /meetings/edit
     */
    public function getEdit($date) {
        return 'Edit a meeting '.$date;
    }

    /**
     * Responds to requests to POST /meetings/edit/{id}
     */
    public function postEdit($date) {
        return 'Process editing meeting '.$date;
    }

    /**
     * Responds to requests to POST /meetings/delete/{id}
     */
    public function postDelete($date) {
        return 'Deleting meeting '.$date;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BallotController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /ballots
    */
    public function getIndex() {
        return 'List all the ballots';
    }

    /**
     * Responds to requests to GET /ballots/show/{id}
     */
    public function getShow($id) {
        return 'Show ballot: '.$id;
    }

    /**
     * Responds to requests to GET /ballots/create
     */
    public function getCreate() {
        return 'Form to create a new ballot';
    }

    /**
     * Responds to requests to POST /ballots/create
     */
    public function postCreate() {
        return 'Process adding new ballot';
    }

    /**
     * Responds to requests to GET /ballots/edit/{id}
     */
    public function getEdit($id) {
        return 'Edit a ballot '.$id;
    }

    /**
     * Responds to requests to POST /ballots/edit/{id}
     */
    public function postEdit($id) {
        return 'Process editing ballot '.$id;
    }

    /**
     * Responds to requests to POST /ballots/delete/{id}
     */
    public function postDelete($id) {
        return 'Deleting ballot '.$id;
    }

    /**
     * Responds to requests to GET /ballots/vote/{id}
     */
    public function getVote($id) {
        return 'Vote here on this ballot '.$id;
    }

    /**
     * Responds to requests to POST /ballots/vote/{id}
     */
    public function postVote($id) {
        return 'You voted on ballot '.$id;
    }

    /**
     * Responds to requests to GET /ballots/tally/{id}
     */
    public function getVote($id) {
        return 'Here are the results on this ballot '.$id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /meetings
    */
    public function getIndex() {
      $meetings = \App\Meeting::orderBy('meeting_date','DESC')->get();
      return view('meetings.index')->with('meetings',$meetings);
    }


    /**
     * Responds to requests to GET /meetings/create
     */
    public function getCreate() {
        return view('meetings.create');
    }

    /**
     * Responds to requests to POST /meetings/create
     */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'meeting_date' => 'required',
              ]
        );

        $meeting = new \App\Meeting();
        $meeting->meeting_date = $request->meeting_date;
        $meeting->meeting_details = $request->meeting_details;
        $meeting->save();
        \Session::flash('flash_message','Your meeting was added!');
        return redirect('/meetings');
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

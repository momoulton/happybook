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
      $meetings = \App\Meeting::with('book')->orderBy('meeting_date','DESC')->get();
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
     * Responds to requests to GET /meetings/edit/{$id}
     */
    public function getEdit($id = null) {
      $meeting = \App\Meeting::find($id);

      if(is_null($meeting)) {
        \Session::flash('flash_message','Meeting not found.');
        return redirect('/meetings');
      }

      return view('meetings.edit')
        ->with(['meeting' => $meeting,]);
    }

    /**
     * Responds to requests to POST /meetings/edit
     */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'meeting_date' => 'required',
              ]
        );

        $meeting = \App\Meeting::find($request->id);
        $meeting->meeting_date = $request->meeting_date;
        $meeting->meeting_details = $request->meeting_details;
        $meeting->save();
        \Session::flash('flash_message','Your meeting was updated!');
        return redirect('/meetings');
    }

    /**
     * Responds to requests to GET /meetings/delete/{id}
     */
    public function getDelete($id) {
        $meeting = \App\Meeting::find($id);

        if(is_null($meeting)) {
          \Session::flash('flash_message','Meeting not found.');
          return redirect('/meetings');
        }
        return view('meetings.delete')->with('meeting',$meeting);
      }

      /**
       * Responds to requests to GET /books/do/delete/{id}
       */
      public function getDoDelete($id) {
          $meeting = \App\Meeting::find($id);
          if(is_null($meeting)) {
            \Session::flash('flash_message','Meeting not found.');
            return redirect('/meetings');
          }
          $meeting->delete();
          \Session::flash('flash_message',$meeting->meeting_date.' was deleted.');
          return redirect('/meetings');
        }
}

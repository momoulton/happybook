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
      $user = \Auth::user();
      $group_id = $user->group_id;
      $group = \App\Group::find($group_id);
      $meetings = \App\Meeting::with('book')->where('group_id',$user->group_id)->orderBy('meeting_date','DESC')->get();
      return view('meetings.index')->with('meetings',$meetings)->with('group',$group);
    }


    /**
     * Responds to requests to GET /meetings/create
     */
    public function getCreate() {
      if (\Auth::user()->group_id === NULL) {
        \Session::flash('flash_message','Please join a group before adding meetings.');
        return redirect('/meetings');
      }
      else {
        return view('meetings.create');
      }
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
        $meeting->user_id = \Auth::user()->id;
        $meeting->group_id = \Auth::user()->group_id;
        $meeting->save();
        \Session::flash('flash_message','Your meeting was added!');
        return redirect('/meetings');
    }

    /**
     * Responds to requests to GET /meetings/edit/{$id}
     */
    public function getEdit($id = null) {
      $meeting = \App\Meeting::find($id);
      $user = \Auth::user();
      if(is_null($meeting)) {
        \Session::flash('flash_message','Meeting not found.');
        return redirect('/meetings');
      }
      elseif($meeting->group_id !== $user->group_id)
      {
        \Session::flash('flash_message','Meeting not found in your group.');
        return redirect('/meetings');
      }
      else {
        return view('meetings.edit')
          ->with(['meeting' => $meeting,]);
        }
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
        $meeting->user_id = \Auth::user()->id;
        $meeting->group_id = \Auth::user()->group_id;
        $meeting->save();
        \Session::flash('flash_message','Your meeting was updated!');
        return redirect('/meetings');
    }

    /**
     * Responds to requests to GET /meetings/delete/{id}
     */
    public function getDelete($id) {
        $meeting = \App\Meeting::find($id);
        $user = \Auth::user();
        if(is_null($meeting)) {
          \Session::flash('flash_message','Meeting not found.');
          return redirect('/meetings');
        }
        elseif($meeting->group_id !== $user->group_id)
        {
          \Session::flash('flash_message','Meeting not found in your group.');
          return redirect('/meetings');
        }
        return view('meetings.delete')->with('meeting',$meeting);
      }

      /**
       * Responds to requests to GET /books/do/delete/{id}
       */
      public function getDoDelete($id) {
          $meeting = \App\Meeting::find($id);
          $user = \Auth::user();
          if(is_null($meeting)) {
            \Session::flash('flash_message','Meeting not found.');
            return redirect('/meetings');
          }
          elseif($meeting->group_id !== $user->group_id)
          {
            \Session::flash('flash_message','Meeting not found in your group.');
            return redirect('/meetings');
          }
          else {
            $meeting->delete();
            \Session::flash('flash_message',$meeting->meeting_date.' was deleted.');
            return redirect('/meetings');
          }
        }
}

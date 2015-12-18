<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /groups
    */
    public function getIndex() {
      $groups = \App\Group::with('meeting')->with('users')->orderBy('name','ASC')->get();
      return view('groups.index')->with('groups',$groups);
    }

    /**
    * Responds to requests to GET /groups/show
    */
    public function getShow($id = null) {
        $group = \App\Group::with('book')->with('users')->find($id);
        $userInGroup = FALSE;
        if (\Auth::check()) {
          $user_id = \Auth::user()->id;
          $group_user_ids = [];
          foreach ($group->users as $user) {
            array_push($group_user_ids,$user->id);
          }
          if (in_array($user_id, $group_user_ids)) {
            $userInGroup = TRUE;
          }
        }
        return view('groups.show')->with('group',$group)->with('userInGroup', $userInGroup);
    }
    /**
     * Responds to requests to GET /groups/create
     */
    public function getCreate() {
        return view('groups.create');
    }

    /**
     * Responds to requests to POST /groups/create
     */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required',
              ]
        );

        $group = new \App\Group();
        $group->name = $request->name;
        $group->save();
        if (isset($request->join)) {
          $user_id = \Auth::id();
          $user = \App\User::find($user_id);
          $user->groups()->attach($group);
        }
        \Session::flash('flash_message','Your group was added!');
        return redirect('/groups');
    }

    /**
     * Responds to requests to GET /groups/edit/{$id}
     */
    public function getEdit($id = null) {
      $group = \App\Group::find($id);

      if(is_null($group)) {
        \Session::flash('flash_message','Group not found.');
        return redirect('/groups');
      }

      return view('groups.edit')
        ->with(['group' => $group,]);
    }

    /**
     * Responds to requests to POST /groups/edit
     */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required',
              ]
        );

        $group = \App\Group::find($request->id);
        $group->name = $request->name;
        $group->save();
        \Session::flash('flash_message','Your group was updated!');
        return redirect('/groups');
    }

    /**
     * Responds to requests to GET /groups/delete/{id}
     */
    public function getDelete($id) {
        $group = \App\Group::find($id);

        if(is_null($group)) {
          \Session::flash('flash_message','Group not found.');
          return redirect('/groups');
        }
        return view('groups.delete')->with('group',$group);
      }

      /**
       * Responds to requests to GET /groups/do/delete/{id}
       */
      public function getDoDelete($id) {
          $group = \App\Group::find($id);
          if(is_null($group)) {
            \Session::flash('flash_message','Group not found.');
            return redirect('/groups');
          }
          if($group->users()) {
            $group->users()->detach();
          }
          $group->delete();
          \Session::flash('flash_message',$group->name.' was deleted.');
          return redirect('/groups');
        }

      /**
       * Responds to requests to GET /groups/join/{id}
       */
      public function getJoin($id) {
          $group = \App\Group::find($id);
          if(\Auth::check()) {
            $user_id = \Auth::id();
            $user = \App\User::find($user_id);
            $user->groups()->attach($group);
            \Session::flash('flash_message','You joined '.$group->name);
            return redirect('/groups');
          }
          else {
            \Session::flash('flash_message','You must be logged in to do this.');
            return redirect('/groups');
          }
      }

      /**
       * Responds to requests to GET /groups/leave/{id}
       */
      public function getLeave($id) {
        $group = \App\Group::find($id);
        if(\Auth::check()) {
          $user_id = \Auth::id();
          $user = \App\User::find($user_id);
          $user->groups()->detach($group);
          \Session::flash('flash_message','You left '.$group->name);
          return redirect('/groups');
        }
        else {
          \Session::flash('flash_message','You left must be logged in to do this.');
          return redirect('/groups');
        }
      }


}

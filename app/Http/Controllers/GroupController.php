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
    public function getShow($id) {
        $group = \App\Group::with('book')->with('users')->find($id);
        $userInGroup = FALSE;
        if (\Auth::user()->group_id === $group->id) {
            $userInGroup = TRUE;
          }
        return view('groups.show')->with('group',$group)->with('userInGroup', $userInGroup);
    }
    /**
     * Responds to requests to GET /groups/create
     */
    public function getCreate() {
        $current_group = \Auth::user()->group_id;
        return view('groups.create')->with('current_group',$current_group);
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
          $user = \Auth::user();
          $user->group_id = $group->id;
          $user->save();
        }
        \Session::flash('flash_message','Your group was added!');
        return redirect('/groups');
    }

    /**
     * Responds to requests to GET /groups/edit/{$id}
     */
    public function getEdit($id = null) {
      $group = \App\Group::find($id);
      $user = \Auth::user();
      if(is_null($group)) {
        \Session::flash('flash_message','Group not found.');
        return redirect('/groups');
      }
      elseif($user->group_id !== $group->id) {
        \Session::flash('flash_message','You are not a member of this group so cannot edit it.');
        return redirect('/groups');
      }
      else {
        return view('groups.edit')
          ->with('group',$group);
        }
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
        $user = \Auth::user();
        if(is_null($group)) {
          \Session::flash('flash_message','Group not found.');
          return redirect('/groups');
        }
        elseif($user->group_id !== $group->id) {
          \Session::flash('flash_message','You are not a member of this group so cannot delete it.');
          return redirect('/groups');
        }
        else {
          return view('groups.delete')->with('group',$group);
        }
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
          $users = \App\User::where('group_id','=',$group->id)->get();
          foreach ($users as $user) {
            $user->group_id = NULL;
            $user->save();
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
        $user = \Auth::user();
        if($user->group_id === $group->id) {
          \Session::flash('flash_message','You are already member of this group.');
          return redirect('/groups');
        }
        elseif($user->group_id !== NULL) {
          \Session::flash('flash_message','You must leave your current group first, or create a new user registration.');
          return redirect('/groups');
        }
        else {
          $user->group_id = $group->id;
          $user->save();
          \Session::flash('flash_message','You joined '.$group->name);
          return redirect('/groups');
        }
      }

      /**
       * Responds to requests to GET /groups/leave/{id}
       */
      public function getLeave($id) {
        $group = \App\Group::find($id);
        $user = \Auth::user();
        if($user->group_id !== $group->id) {
          \Session::flash('flash_message','You are not a member of this group so cannot leave it.');
          return redirect('/groups');
        }
        else {
          $user->group_id = NULL;
          $user->save();
          \Session::flash('flash_message','You left '.$group->name);
          return redirect('/groups');
        }
      }


}

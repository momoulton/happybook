@extends('layouts.master')

@section('title')
  Groups
@stop

@section('content')
  <h2>See All Groups</h2>
  <p><a href="/groups/create">Add a new group</a></p>
    @if(sizeof($groups) == 0)
        There are no groups yet!
    @else
        @foreach($groups as $group)
            <div>
                <h3>
                  @if($group->id === \Auth::user()->group_id)My group:
                  @endif
                  <a href='/groups/show/{{$group->id}}'>{{ $group->name }}</a>
                </h3>
            </div>
        @endforeach
    @endif
@stop

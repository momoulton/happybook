@extends('layouts.master')

@section('title')
  groups
@stop

@section('content')
  <h2>All Groups</h2>
  <p><a href="/groups/create">Add a new group</a></p>
    @if(sizeof($groups) == 0)
        There are no groups yet!
    @else
        @foreach($groups as $group)
            <div>
                <h3><a href='/groups/show/{{$group->id}}'>{{ $group->name }}</a></h3>
            </div>
        @endforeach
    @endif
@stop

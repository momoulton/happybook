@extends('layouts.master')

@section('title')
  Show Group
@stop

@section('content')
      <h2><i>{{ $group->name }}</i></h2>
      @if($userInGroup)
          <a href='/groups/leave/{{$group->id}}'>Leave</a> |
          <a href='/groups/edit/{{$group->id}}'>Edit</a> |
          <a href='/groups/delete/{{$group->id}}'>Delete</a> <br>
      @elseif(\Auth::user()->group_id === NULL)
          <a href='/groups/join/{{$group->id}}'>Join</a>
      @endif
      <h3>This group has read: </h3>
      <ul>
        @foreach ($group->book as $book)
            <li>{{$book->author}}, <i><a href="/books/show/{{$book->id}}">{{$book->title}}</a></i> ({{$book->year}})</li>
        @endforeach
      </ul>
      @if($userInGroup)
        <h3>Members of this group: </h3>
        <ul>
          @foreach ($group->users as $user)
              <li>{{$user->name}}</li>
          @endforeach
        </ul>
      @endif

@stop

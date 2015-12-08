@extends('layouts.master')

@section('title')
  Meetings
@stop

@section('content')
  <h2>All Meetings</h2>
  <p><a href="/meetings/create">Add a new meeting</a></p>
    @if(sizeof($meetings) == 0)
        You have not added any meetings.
    @else
        @foreach($meetings as $meeting)
            <div>
                <h3>{{ $meeting->meeting_date }}</h3>
                <p>{{ $meeting->meeting_details}}</p>
                <a href='/meetings/edit/{{$meeting->id}}'>Edit</a> |
                <a href='/meetings/delete/{{$meeting->id}}'>Delete</a> <br>
                <a href='/ballots/create/{{$meeting->id}}'>Create Ballot</a> |
                <a href='/ballots/{{$meeting->id}}'>View Ballot</a><br><br>
            </div>
        @endforeach
    @endif
@stop

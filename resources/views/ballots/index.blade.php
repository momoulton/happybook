@extends('layouts.master')

@section('title')
  Ballots
@stop

@section('content')
  <h2>All Ballots</h2>
  <p><a href="/meetings/create">Create a new meeting</a></p>
    @if(sizeof($ballots) == 0)
        You have not created any ballots.
    @else
        @foreach($ballots as $ballot)
            <div>
                <h3>{{ $meeting->meeting_date }}</h3>
                <p>{{ $meeting->meeting_details}}</p>
                <a href='/meetings/edit/{{$meeting->id}}'>Edit</a> |
                <a href='/meetings/delete/{{$meeting->id}}'>Delete</a> <br>
                <a href='/ballots/create/{{$meeting->id}}'>Create Ballot</a> |
                <a href='/ballots/{{$meeting->id}}'>View Ballot</a><br>
                @if(isset($meeting->book_id))
                <p>Book selection: {{$meeting->book->author}}, <i>{{$meeting->book->title}}</i> ({{$meeting->book->year}})</p><br><br>
                @endif
            </div>
        @endforeach
    @endif
@stop

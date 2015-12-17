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
                @if(isset($meeting->book_id))
                <p>Book selection: {{$meeting->book->author}}, <i>{{$meeting->book->title}}</i> ({{$meeting->book->year}})</p><br><br>
                @endif
            </div>
        @endforeach
    @endif
@stop

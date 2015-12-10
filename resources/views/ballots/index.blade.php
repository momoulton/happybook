@extends('layouts.master')

@section('title')
  Ballots
@stop

@section('content')
  <h2>All Ballots</h2>
  <p><a href="/ballots/create">Create a new ballot</a></p>
    @if(sizeof($ballots) == 0)
        You have not created any ballots.
    @else
        @foreach($ballots as $ballot)
            <div>
                <h3>{{ $ballot->meeting->meeting_date }}</h3>
                <a href='/ballots/edit/{{$ballot->id}}'>Edit</a> |
                <a href='/ballots/delete/{{$ballot->id}}'>Delete</a> <br>
                <a href='/ballots/vote/{{$ballot->id}}'>Vote</a> |
                <a href='/ballots/tally/{{$ballot->id}}'>See results</a><br>
                Books on ballot:
                <ul>
                  @foreach($ballot->books as $book)
                    <li>{{$book->author}}, <a href='/books/show/{{$book->id}}'><i>{{$book->title}}</i></a> ({{$book->year}})</li>
                  @endforeach
                </ul>
            </div>
        @endforeach
    @endif
@stop

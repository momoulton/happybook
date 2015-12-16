@extends('layouts.master')

@section('title')
  Results
@stop

@section('content')
  <h2>Results</h2>
    @if(sizeof($ballot->votes) == 0)
        No one has voted on this ballot yet.
    @elseif($pref_not_used AND !$tie)
        <p>Number of votes cast: {{sizeOf($ballot->votes)}}</p>
        <p>Winning book: {{$chosen_book->author}}, <a href='/books/show/{{$chosen_book->id}}'><i>{{$chosen_book->title}}</i></a> ({{$chosen_book->year}})</p>
        <p>Note: only two books on ballot. Preferential voting not used.</p>
    @elseif($pref_not_used AND $tie)
        <p>Number of votes cast: {{sizeOf($ballot->votes)}}</p>
        <p>Note: only two books on ballot. Result was a tie.</p>
    @else
        <p>Number of votes cast: {{sizeOf($ballot->votes)}}</p>
        <p>Winning book: {{$chosen_book->author}}, <a href='/books/show/{{$chosen_book->id}}'><i>{{$chosen_book->title}}</i></a> ({{$chosen_book->year}})</p>
        <p>Number of rounds: {{$round}}</p>
    @endif
@stop

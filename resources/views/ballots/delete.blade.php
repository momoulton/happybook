@extends('layouts.master')

@section('title')
  Delete Ballot
@stop

@section('content')
      <p>Do you really want to delete the ballot associated with the meeting on <i>{{ $ballot->meeting->meeting_date }}</i>?</p>
      <p><a href='/ballots/do/delete/{{ $ballot->id }}'>Yes</a></p>
      <p><a href='/ballots'>No</a></p>
@stop

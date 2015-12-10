@extends('layouts.master')

@section('title')
  Delete Meeting
@stop

@section('content')
      <p>Do you really want to delete the meeting scheduled for <i>{{ $meeting->meeting_date }}</i>?</p>
      <p><a href='/meetings/do/delete/{{ $meeting->id }}'>Yes</a></p>
      <p><a href='/meetings'>No</a></p>
@stop

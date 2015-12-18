@extends('layouts.master')

@section('title')
  Delete Group
@stop

@section('content')
      <p>Do you really want to delete the group <i>{{ $group->name }}</i>?</p>
      <p><a href='/groups/do/delete/{{ $group->id }}'>Yes</a></p>
      <p><a href='/groups'>No</a></p>
@stop

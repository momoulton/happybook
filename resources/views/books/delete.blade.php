@extends('layouts.master')

@section('title')
  Delete Book
@stop

@section('content')
      <p>Do you really want to delete <i>{{ $book->title }}</i>?</p>
      <p><a href='/books/do/delete/{{ $book->id }}'>Yes</a></p>
      <p><a href='/books'>No</a></p>
@stop

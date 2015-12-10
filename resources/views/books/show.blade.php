@extends('layouts.master')

@section('title')
  Show Book
@stop

@section('content')
      <h2><i>{{ $book->title }}</i></h2>
      <h3>Author: {{ $book->author }}</h3>
      <h3>Published: {{ $book->year }}</h3>
      <img src='{{ $book->image_link }}'>
      <p>{{ $book->description}}</p>
      <a href='{{ $book->purchase_link}}'>Purchase</a><br>
      <a href='/books/edit/{{$book->id}}'>Edit</a> |
      <a href='/books/delete/{{$book->id}}'>Delete</a><br> <br>
      <a href='/books'>Back to Book List</a>
@stop

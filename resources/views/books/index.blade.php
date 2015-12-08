@extends('layouts.master')

@section('title')
  Books
@stop

@section('content')
  <h2>All Books</h2>
  <p><a href="/books/create">Add a new book</a></p>
    @if(sizeof($books) == 0)
        You have not added any books.
    @else
        @foreach($books as $book)
            <div>
                <img src='{{ $book->image_link }}'>
                <h3>{{ $book->author }}, <i>{{ $book->title }}</i> ({{ $book->year }})</h3>
                <a href='books/show/{{$book->id}}'>Show Details</a> |
                <a href='/books/edit/{{$book->id}}'>Edit</a> |
                <a href='/books/delete/{{$book->id}}'>Delete</a> |
                <a href='/books/edit/{{$book->id}}'>Add to a Ballot</a><br><br>
            </div>
        @endforeach
    @endif
@stop

@extends('layouts.master')

@section('title')
  Books
@stop

@section('content')
  <h2>All Books</h2>
    @if(sizeof($books) == 0)
        You have not added any books.
    @else
        @foreach($books as $book)
            <div>
                <h3>{{ $book->author }}, <i>{{ $book->title }}</i> ({{ $book->year }})</h3>
                <a href='books/show/{{$book->id}}'>Show Details</a><br>
                <a href='/books/edit/{{$book->id}}'>Edit</a> |
                <a href='/books/delete/{{$book->id}}'>Delete</a><br>
                <a href='/ballots'>Add to a Ballot</a><br>
                <img src='{{ $book->image_link }}'>
            </div>
        @endforeach
    @endif
@stop

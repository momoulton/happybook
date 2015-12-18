@extends('layouts.master')

@section('title')
  Book Selector
@stop

@section('content')
  <h3>About the Selector</h3>
  <p>Choosing a book to read for your book club does not have to be difficult. Use this selector to say goodbye to the long e-mail chains searching for consensus.</p>
  <p>You can view book options and meeting plans to facilitate easy book club organization.</p>
  <p>And most importantly, you can vote on book options and generate a consensus choice. The Book Selector uses Preferential Voting, also known as instant-runoff voting. Members of your club will rank their book choices. If no book wins an outright majority, the lowest vote-getter is eliminated, and its votes are redistributed until a book does gain a majority. You can read more about <a href='https://en.wikipedia.org/wiki/Instant-runoff_voting' target='_blank'>here</a>.</p>
  <h3>Using the Selector</h3>
  <p>Start by signing up. Then, join or create a group, add books and meetings, and create a ballot. Once you have a ballot, share it with your fellow club members and collect votes. Finally, don't forget to read the book!</p>
  <h3>Test Drive</h3>
  <p>Log in as "mo@sample.com", password "sample", to get a feel for how the site works without having to create any of your own content.</p>
  <h3>Caveats</h3>
  <p>This is very much a prototype site. <a href='/about'>Let me know</a> if you run into problems or have suggestions. Note that the voting algorithm deals with ties by simply choosing a winner. Don't use this site if you're running a legally-significant election!</p> 

@stop

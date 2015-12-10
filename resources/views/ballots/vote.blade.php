@extends('layouts.master')

@section('title')
  Vote
@stop

@section('content')
  <h1>Vote for meeting scheduled {{$ballot->meeting->meeting_date}}</h1>
  <p>Enter your preferences, starting with 1 for the most preferred book. You may not use the same preference twice (only one book can be ranked #1, and so on). You must rank each book.</p>

  <form method='POST' action='/ballots/vote'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <input type='hidden' name='id' value='{{ $ballot->id }}'>

      <div class='form-group'>
          <label for='books'>Books:</label><br>
          @foreach($ballot->books as $book)
              <input type='text' name='books[]'> {{ $book->author }}, <i>{{ $book->title}}</i> ({{$book->year}})<br>
          @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Vote</button>
  </form>

@stop

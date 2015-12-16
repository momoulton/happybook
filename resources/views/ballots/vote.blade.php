@extends('layouts.master')

@section('title')
  Vote
@stop

@section('content')
  <h1>Vote for meeting scheduled {{$ballot->meeting->meeting_date}}</h1>
  <p>Enter your preferences, starting with 1 for the most preferred book. You may not use the same preference twice (only one book can be ranked #1, and so on). You must rank each book.</p>
  @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method='POST' action='/ballots/vote'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <input type='hidden' name='id' value='{{ $ballot->id }}'>

      <input type='hidden' name='size' value='{{ sizeOf($ballot->books) }}'>

      <div class='form-group'>
          <label for='votes'>Books:</label><br>
          @foreach($ballot->books as $book)
              <input type='text' name='votes[]'> {{ $book->author }}, <i>{{ $book->title}}</i> ({{$book->year}})<br>
              <input type='hidden' name='books[]' value='{{ $book->id }}'>
          @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Vote</button>
  </form>

@stop

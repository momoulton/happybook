@extends('layouts.master')

@section('title')
  Create a Ballot
@stop

@section('content')
  <h1>Create a Ballot</h1>

  <form method='POST' action='/ballots/create'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <div class='form-group'>
          <label for='meeting'>Meeting:</label>
          <select name='meeting' id='meeting'>
                @foreach($meetings_for_menu as $meeting)
                    <option value='{{ $meeting->id }}'> {{ $meeting->meeting_date }} </option>
                @endforeach
            </select>
      </div>

      <div class='form-group'>
          <label for='books'>Books (choose between 2 and 7):</label><br>
          @foreach($books_for_checkbox as $book)
              <input type='checkbox' name='books[]' value='{{$book->id}}'> {{ $book->author }}, <i>{{ $book->title}}</i> ({{$book->year}})<br>
          @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Create ballot</button>
  </form>

@stop

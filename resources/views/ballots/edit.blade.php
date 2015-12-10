@extends('layouts.master')

@section('title')
  Edit Ballot
@stop

@section('content')
  <h1>Edit Ballot</h1>

  <form method='POST' action='/ballots/edit'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <input type='hidden' name='id' value='{{ $ballot->id }}'>

      <div class='form-group'>
          <label for='meeting'>Meeting:</label>
          <select name='meeting' id='meeting'>
                @foreach($meetings_for_menu as $meeting)
                    {{ $selected = ($meeting->id == $ballot->meeting->id) ? 'selected' : '' }}
                    <option value='{{ $meeting->id }}' {{ $selected }}> {{ $meeting->meeting_date }} </option>
                @endforeach
            </select>
      </div>

      <div class='form-group'>
          <label for='books'>Books:</label><br>
          @foreach($books_for_checkbox as $book)
          <?php $checked = (in_array($book->id,$books_for_ballot)) ? 'CHECKED' : '' ?>
              <input {{ $checked }} type='checkbox' name='books[]' value='{{$book->id}}'> {{ $book->author }}, <i>{{ $book->title}}</i> ({{$book->year}})<br>
          @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Save ballot</button>
  </form>

@stop

@extends('layouts.master')

@section('title')
  Add a Meeting
@stop

@section('content')
  <h1>Add a meeting</h1>

  <form method='POST' action='/meetings/create'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <div class='form-group'>
          <label for='meeting_date'>Date (YYYY-MM-DD):</label>
          <input
              type='text'
              id='meeting_date'
              name='meeting_date'
              value='{{ old('meeting_date') }}'
          >
      </div>

      <div class='form-group'>
          <label for='meeting_details'>Details:</label>
          <input
              type='text'
              id='meeting_details'
              name='meeting_details'
              value='{{ old('meeting_details') }}'
          >
      </div>

      <button type="submit" class="btn btn-primary">Add meeting</button>
  </form>

@stop

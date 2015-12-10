@extends('layouts.master')

@section('title')
  Add a Meeting
@stop

@section('content')
  <h1>Edit a meeting</h1>

  <form method='POST' action='/meetings/edit'>

    <input type='hidden' value='{{ csrf_token() }}' name='_token'>

    <input type='hidden' name='id' value='{{ $meeting->id }}'>

      <div class='form-group'>
          <label for='meeting_date'>Date (YYYY-MM-DD):</label>
          <input
              type='text'
              id='meeting_date'
              name='meeting_date'
              value='{{ $meeting->meeting_date }}'
          >
      </div>

      <div class='form-group'>
          <label for='meeting_details'>Details:</label>
          <input
              type='text'
              id='meeting_details'
              name='meeting_details'
              value='{{ $meeting->meeting_details }}'
          >
      </div>

      <button type="submit" class="btn btn-primary">Save meeting</button>
  </form>

@stop

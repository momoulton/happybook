@extends('layouts.master')

@section('title')
  Edit Group
@stop

@section('content')
  <h1>Edit group</h1>

  <form method='POST' action='/groups/edit'>

    <input type='hidden' value='{{ csrf_token() }}' name='_token'>

    <input type='hidden' name='id' value='{{ $group->id }}'>

      <div class='form-group'>
          <label for='name'>Name:</label>
          <input
              type='text'
              id='name'
              name='name'
              value='{{ $group->name }}'
          >
      </div>

      <button type="submit" class="btn btn-primary">Save group</button>
  </form>

@stop

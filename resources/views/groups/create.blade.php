@extends('layouts.master')

@section('title')
  Create Group
@stop

@section('content')
  <h1>Create a group</h1>

  <form method='POST' action='/groups/create'>

    <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <div class='form-group'>
          <label for='name'>Name:</label>
          <input
              type='text'
              id='name'
              name='name'
              value='{{ old('name') }}'
          >
      </div>

      @if ($current_group === NULL)
        <div class='form-group'>
            <label for='join'>Tick the box to join this group automatically </label>
            <input
                type='checkbox'
                id='join'
                name='join'
            >
        </div>
      @else
        You currently belong to another group. To join this group, you will either have to (a) leave your current group or (b) log out and create a new registration for your new group.
      @endif

      <button type="submit" class="btn btn-primary">Create group</button>
  </form>

@stop

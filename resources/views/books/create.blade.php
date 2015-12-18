@extends('layouts.master')

@section('title')
  Add a Book
@stop

@section('content')
  <h1>Add a book</h1>

  <form method='POST' action='/books/create'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <div class='form-group'>
          <label for='title'>Title:</label>
          <input
              type='text'
              id='title'
              name='title'
              value='{{ old('title') }}'
          >
      </div>

      <div class='form-group'>
          <label for='author'>Author:</label>
          <input
              type='text'
              id='author'
              name='author'
              value='{{ old('author') }}'
          >
      </div>

      <div class='form-group'>
          <label for='year'>Published (YYYY):</label>
          <input
              type='text'
              id='year'
              name="year"
              value='{{ old('year') }}'
              >
      </div>

      <div class='form-group'>
          <label for='description'>Description:</label>
          <input
              type='text'
              id='description'
              name="description"
              value='{{ old('description') }}'
              >
      </div>

      <div class='form-group'>
          <label for='image_link'>Cover (URL):</label>
          <input
              type='text'
              id='image_link'
              name="image_link"
              value='{{ old('image_link') }}'
              >
      </div>

      <div class='form-group'>
          <label for='purchase_link'>Where to purchase this book (URL):</label>
          <input
              type='text'
              id='purchase_link'
              name='purchase_link'
              value='{{ old('purchase_link') }}'
              >
      </div>

      <div class='form-group'>
          <label for='group'>Group:</label>
          <select name='group' id='group'>
                @foreach($groups_for_menu as $group)
                    <option value='{{ $group->id }}'> {{ $group->name }} </option>
                @endforeach
            </select>
      </div>

      <button type="submit" class="btn btn-primary">Add book</button>
  </form>

@stop

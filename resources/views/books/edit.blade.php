@extends('layouts.master')

@section('title')
    Edit Book
@stop


@section('content')

    <h1>Edit</h1>

    <form method='POST' action='/books/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $book->id }}'>

        <div class='form-group'>
            <label>Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{$book->title}}'
            >
        </div>

        <div class='form-group'>
            <label for='author'>Author:</label>
            <input
                type='text'
                id='author'
                name='author'
                value='{{$book->author}}'
            >
        </div>

        <div class='form-group'>
            <label for='year'>Published (YYYY):</label>
            <input
                type='text'
                id='year'
                name="year"
                value='{{ $book->year }}'
                >
        </div>

        <div class='form-group'>
            <label for='description'>Description:</label>
            <input
                type='text'
                id='description'
                name="description"
                value='{{ $book->description }}'
                >
        </div>

        <div class='form-group'>
            <label for='image_link'>Cover (URL):</label>
            <input
                type='text'
                id='image_link'
                name="image_link"
                value='{{ $book->image_link }}'
                >
        </div>

        <div class='form-group'>
            <label for='purchase_link'>Where to purchase this book (URL):</label>
            <input
                type='text'
                id='purchase_link'
                name='purchase_link'
                value='{{ $book->purchase_link }}'
                >
        </div>

        <div class='form-group'>
            <label for='meeting'>Add to Ballot?</label>
                <br>
                @foreach($meetings_for_menu as $meeting)
                    <?php $checked = (in_array($meeting,$meetings_for_this_book)) ? 'CHECKED' : '' ?>
                    <input {{ $checked }} type='checkbox' name='meetings[]' value='{{ $meeting->meeting_id }}'> {{ $meeting->meeting_date }} <br>
                @endforeach
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@stop

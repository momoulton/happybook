<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\User::where('name', 'LIKE', 'Jill')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jamal')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jane')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Joe')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Mo')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jenny')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Pat')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jesse')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Joby')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jeff')->pluck('id');
        $first_choice = \App\Book::where('title', 'LIKE', 'Wives and Daughters')->pluck('id');
        $second_choice = \App\Book::where('title', 'LIKE', 'The Gathering')->pluck('id');
        $third_choice = \App\Book::where('title', 'LIKE', 'To the Lighthouse')->pluck('id');
        $fourth_choice = \App\Book::where('title', 'LIKE', 'Whose Body?')->pluck('id');
        $fifth_choice = \App\Book::where('title', 'LIKE', 'The Bone People')->pluck('id');
        DB::table('votes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'ballot_id' => 1,
          'user_id' => $user_id,
          'first_choice' => $first_choice,
          'second_choice' => $second_choice,
          'third_choice' => $third_choice,
          'fourth_choice' => $fourth_choice,
          'fifth_choice' => $fifth_choice,
        ]);

    }
}

<?php

use Illuminate\Database\Seeder;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\User::where('name', 'LIKE', 'Jill')->pluck('id');
        $group_id = \App\User::where('name', 'LIKE', 'Happy Book Club')->pluck('id');
        $book_id = \App\Book::where('title','=','Whose Body?')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2015-12-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $book_id = \App\Book::where('title','=','The Gathering')->pluck('id');
        $user_id = \App\User::where('name', 'LIKE', 'Jane')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-1-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $book_id = \App\Book::where('title','=','The Bone People')->pluck('id');
        $user_id = \App\User::where('name', 'LIKE', 'Mo')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-2-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $book_id = \App\Book::where('title','=','To the Lighthouse')->pluck('id');
        $user_id = \App\User::where('name', 'LIKE', 'Pat')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-3-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $book_id = \App\Book::where('title','=','Wives and Daughters')->pluck('id');
        $user_id = \App\User::where('name', 'LIKE', 'Jamal')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-4-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);
    }
}

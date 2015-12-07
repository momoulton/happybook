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
        $book_id = \App\Book::where('title','=','Whose Body?')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2015-12-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
        ]);

        $book_id = \App\Book::where('title','=','The Gathering')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-1-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
        ]);

        $book_id = \App\Book::where('title','=','The Bone People')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-2-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
        ]);

        $book_id = \App\Book::where('title','=','To the Lighthouse')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-3-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
        ]);

        $book_id = \App\Book::where('title','=','Wives and Daughters')->pluck('id');
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-4-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => $book_id,
        ]);
    }
}

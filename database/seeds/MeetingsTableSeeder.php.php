<?php

use Illuminate\Database\Seeder;

class MeetingsTableSeeder.php extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2015-12-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => 0,
        ]);

        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2015-12-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => 0,
        ]);

        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-1-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => 0,
        ]);

        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-2-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => 0,
        ]);

        DB::table('meetings')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_date' => '2016-3-20',
          'meeting_details' => 'Meet at 7pm at JP Licks, Centre Street.',
          'book_id' => 0,
        ]);
    }
}

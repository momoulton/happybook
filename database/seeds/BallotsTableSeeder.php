<?php

use Illuminate\Database\Seeder;

class BallotsTableSeeder extends Seeder
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
        $meeting_id = \App\Meeting::where('meeting_date','=','2015-12-20')->pluck('id');
        DB::table('ballots')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_id' => $meeting_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $meeting_id = \App\Meeting::where('meeting_date','=','2016-1-20')->pluck('id');
        DB::table('ballots')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_id' => $meeting_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $meeting_id = \App\Meeting::where('meeting_date','=','2016-2-20')->pluck('id');
        DB::table('ballots')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_id' => $meeting_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $meeting_id = \App\Meeting::where('meeting_date','=','2016-3-20')->pluck('id');
        DB::table('ballots')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_id' => $meeting_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $meeting_id = \App\Meeting::where('meeting_date','=','2016-4-20')->pluck('id');
        DB::table('ballots')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'meeting_id' => $meeting_id,
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);
    }
}

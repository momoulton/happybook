<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(MeetingsTableSeeder::class);
        $this->call(BallotsTableSeeder::class);
        $this->call(BallotBookTableSeeder::class);
        $this->call(VotesTableSeeder::class);
        Model::reguard();
    }
}

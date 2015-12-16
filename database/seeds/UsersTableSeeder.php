<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate(['email' => 'jill@harvard.edu']);
        $user->name = 'Jill';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
        $user->name = 'Jamal';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jane@harvard.edu']);
        $user->name = 'Jane';
        $user->email = 'jane@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'joe@harvard.edu']);
        $user->name = 'Joe';
        $user->email = 'joe@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'mo@harvard.edu']);
        $user->name = 'Mo';
        $user->email = 'mo@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jenny@harvard.edu']);
        $user->name = 'Jenny';
        $user->email = 'jenny@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'pat@harvard.edu']);
        $user->name = 'Pat';
        $user->email = 'pat@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jesse@harvard.edu']);
        $user->name = 'Jesse';
        $user->email = 'jesse@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'joby@harvard.edu']);
        $user->name = 'Joby';
        $user->email = 'joby@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jeff@harvard.edu']);
        $user->name = 'Jeff';
        $user->email = 'jeff@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}

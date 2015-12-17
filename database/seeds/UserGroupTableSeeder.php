<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users =[
          'Jill' => ['Happy Book Club', 'Wednesday Book Club'],
          'Jamal' => ['Happy Book Club', 'Wednesday Book Club'],
          'Jane' => ['Happy Book Club'],
          'Joe' => ['Happy Book Club'],
          'Mo' => ['Happy Book Club', 'Wednesday Book Club'],
          'Jenny' => ['Happy Book Club'],
          'Pat' => ['Happy Book Club'],
          'Jesse' => ['Happy Book Club'],
          'Joby' => ['Happy Book Club'],
          'Jeff' => ['Happy Book Club'],
      ];

      foreach($users as $name => $groups) {

          $user = \App\User::where('name','like',$name)->first();

          # Now loop through each tag for this book, adding the pivot
          foreach($groups as $groupName) {
              $group = \App\Group::where('name','LIKE',$groupName)->first();

              # Connect this tag to this book
              $user->groups()->save($group);
          }

      }
}

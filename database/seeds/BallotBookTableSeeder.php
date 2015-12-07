<?php

use Illuminate\Database\Seeder;

class BallotBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ballots = [
          1 => ['Whose Body?', 'The Gathering', 'The Bone People', 'To the Lighthouse', 'Wives and Daughters'],
          2 => ['The Gathering', 'The Bone People', 'To the Lighthouse', 'Wives and Daughters'],
          3 => ['The Bone People', 'To the Lighthouse', 'Wives and Daughters'],
          4 => ['Whose Body?', 'The Gathering', 'The Bone People'],
          5 => ['Whose Body?', 'The Bone People', 'To the Lighthouse'],
        ];

        foreach($ballots as $meeting_id => $books) {
            $ballot = \App\Ballot::where('meeting_id', '=', $meeting_id)->first();

            foreach($books as $title) {
              $book = \App\Book::where('title', 'LIKE',$title)->first();
              $ballot->books()->save($book);
            }
        }
    }
}

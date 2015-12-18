<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\User::where('name', 'LIKE', 'Jill')->pluck('id');
        $group_id = \App\Group::where('name', 'LIKE', 'Happy Book Club')->pluck('id');
        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => 'Whose Body?',
          'author' => 'Dorothy L. Sayers',
          'year' => 1923,
          'description' => 'The naked body was lying in the tub. Not unusual for a proper bath, but highly irregular for murder--especially with a pair of gold pince-nez deliberately perched before the sightless eyes. What\'s more, the face appeared to have been shaved after death. In this, his first murder case, Lord Peter untangles the mystery of the corpse in the bath.',
          'purchase_link' => 'http://www.powells.com/book/whose-body-9780061043574/2-9',
          'image_link' => 'http://covers.powells.com/9780061043574.jpg',
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Jeff')->pluck('id');
        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => 'The Gathering',
          'author' => 'Anne Enright',
          'year' => 2007,
          'description' => 'The nine surviving children of the Hegarty clan are gathering in Dublin for the wake of their wayward brother, Liam, drowned in the sea. His sister, Veronica, collects the body and keeps the dead man company, guarding the secret she shares with him  something that happened in their grandmother\'s house in the winter of 1968. As Enright traces the line of betrayal and redemption through three generations, she shows how memories warp and secrets fester. The Gathering is a family epic, clarified through Anne Enright\'s unblinking eye. This is a novel about love and disappointment, about how fate is written in the body, not in the stars.',
          'purchase_link' => 'http://www.powells.com/book/gathering-9780802170392/17-35',
          'image_link' => 'http://covers.powells.com/9780802170392.jpg',
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        $user_id = \App\User::where('name', 'LIKE', 'Joby')->pluck('id');
        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => 'The Bone People',
          'author' => 'Keri Hulme',
          'year' => 1984,
          'description' => 'In a tower on the New Zealand sea lives Kerewin Holmes, part Maori, part European, an artist estranged from her art, a woman in exile from her family. One night her solitude is disrupted by a visitora speechless, mercurial boy named Simon, who tries to steal from her and then repays her with his most precious possession. As Kerewin succumbs to Simon\'s feral charm, she also falls under the spell of his Maori foster father Joe, who rescued the boy from a shipwreck and now treats him with an unsettling mixture of tenderness and brutality. Out of this unorthodox trinity Keri Hulme has created what is at once a mystery, a love story, and an ambitious exploration of the zone where Maori and European New Zealand meet, clash, and sometimes merge.',
          'purchase_link' => 'http://www.powells.com/book/bone-people-9780140089226/17-69',
          'image_link' => 'http://covers.powells.com/9780140089226.jpg',
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => 'To the Lighthouse',
          'author' => 'Virginia Woolf',
          'year' => 1927,
          'description' => 'To the Lighthouse is one of the greatest literary achievements of the twentieth century and the author\'s most popular novel. The serene and maternal Mrs. Ramsay, the tragic yet absurd Mr. Ramsay, and their children and assorted guests are on holiday on the Isle of Skye. From the seemingly trivial postponement of a visit to a nearby lighthouse, Virginia Woolf constructs a remarkable, moving examination of the complex tensions and allegiances of family life and the conflict between male and female principles.',
          'purchase_link' => 'http://www.powells.com/book/to-the-lighthouse-9780199536610/66-0',
          'image_link' => 'http://covers.powells.com/9780199536610.jpg',
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);

        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => 'Wives and Daughters',
          'author' => 'Elizabeth Gaskell',
          'year' => 1864,
          'description' => 'An enchanting tale of romance, scandal, and intrigue in the gossipy English town of Hollingford around the 1830s, Wives and Daughters tells the story of Molly Gibson, the seventeen-year-old daughter of a widowed country doctor. When her father remarries, she forms a close friendship with her new stepsisterthe beautiful and worldly Cynthiauntil they become love rivals for the affections of Squire Hamleys sons, Osbourne and Roger. When sudden illness and death reveal some secrets while shrouding others in even deeper mystery, Molly feels that the world is out of joint and it is up to hertrusted by all but listened to by noneto set it right.',
          'purchase_link' => 'http://www.powells.com/book/wives-and-daughters-9781593082574/2-1',
          'image_link' => 'http://covers.powells.com/9781593082574.jpg',
          'group_id' => $group_id,
          'user_id' => $user_id,
        ]);
    }
}

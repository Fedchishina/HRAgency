<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Classes\RandomData;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 25; $i++){
            $c = new Comment;
            $c->name = RandomData::getFirstName();
            $c->email = $c->name . '@mail.com';
            $c->comment = RandomData::getRandomComment();
            $c->moderated = rand(0,1);
            $c->save();
        }
    }
}

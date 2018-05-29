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
        factory(App\Comment::class, 50)->create();

        $this->command->info('Comments table seeded!');
    }
}

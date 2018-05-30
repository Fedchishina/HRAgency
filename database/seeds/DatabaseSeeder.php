<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CommentsSeeder::class);
        $this->call(ContactUsSeeder::class);
        //$this->call(UsersSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(PersonsSeeder::class);
    }
}

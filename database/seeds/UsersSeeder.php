<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'login' => 'admin',
            'email' => 'admin@hragency.com',
            'password' => bcrypt('admin'),
        ]);
    }
}

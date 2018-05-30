<?php

use Illuminate\Database\Seeder;
use App\Classes\RandomData;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++){
            DB::table('salary')->insert([
                'position' => RandomData::getPosition($i),
                'salary' => rand(1000,100000),
            ]);
        }

        $this->command->info('Salary table seeded!');
    }
}

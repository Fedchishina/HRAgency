<?php

use Illuminate\Database\Seeder;
use App\Salary;
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
            $s = new Salary;
            $s->position = RandomData::getPosition($i);
            $s->salary = rand(1000,100000);
            $s->save();
        }
    }
}

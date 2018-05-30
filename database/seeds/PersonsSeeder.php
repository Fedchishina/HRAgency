<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\PersonInfo;
use Faker\Factory as Factory;

class PersonsSeeder extends Seeder
{
    private function insertRecord($pId, $child = true)
    {
        $faker = Factory::create();

        $rec = new Person;
        $rec->parent = $pId;
        $rec->salary_id = rand(1, 100);
        $rec->children = $child;
        $recInfo = new PersonInfo;
        $recInfo->first_name = $faker->firstName;
        $recInfo->last_name = $faker->lastName;
        $recInfo->image_id = rand(2, 6);
        $rec->save();
        $rec->persons_info()->save($recInfo);
        return $rec->id;
    }

    public function run()
    {
        $date = new DateTime();
        echo 'Start Persons table seeding time: ';
        echo $date->format('Y-m-d H:i:s') . "\n";
        $rc = 0;
        $idA = $this->insertRecord('#');
        $rc++;
        for ($i = 0; $i < 5; $i++) {
            $idB = $this->insertRecord($idA);
            $rc++;
            for ($y = 0; $y < 10; $y++) {
                $idC = $this->insertRecord($idB);
                $rc++;
                for ($j = 0; $j < 10; $j++) {
                    $idD = $this->insertRecord($idC);
                    $rc++;
                    for ($k = 0; $k < 10; $k++) {
                        $idE = $this->insertRecord($idD);
                        $rc++;
                        for ($p = 0; $p < 10; $p++) {
                            $this->insertRecord($idE, false);
                            $rc++;
                        }
                    }
                }
            }
        }
        $date = new DateTime();
        echo 'Persons table seeding ended in: ';
        echo $date->format('Y-m-d H:i:s') . "\n";
        echo "Total added records to Persons table: " . $rc . "\n";
    }
}
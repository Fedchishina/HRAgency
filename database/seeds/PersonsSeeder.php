<?php

use Illuminate\Database\Seeder;

class PersonsSeeder extends Seeder
{
    public function run()
    {
        factory(App\Person::class)->create();

        $this->command->info('Persons tables seeded!');

        /*

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
        echo $date->format('Y-m-d H:i:s') . */
    }
}

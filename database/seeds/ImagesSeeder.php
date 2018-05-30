<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec = new Image;
        $rec->image_link = Storage::url('public/photos/no-photo.jpg');
        $rec->save();

        for($i = 0; $i < 5; $i++){
            $rec = new Image;
            $rec->image_link = Storage::url('public/photos/sample' . ($i + 1) .'.jpg');
            $rec->image_thumb = Storage::url('public/photos/sample' . ($i + 1) .'.thumb.jpg');
            $rec->save();
        }

        $this->command->info('Images table seeded!');
    }
}

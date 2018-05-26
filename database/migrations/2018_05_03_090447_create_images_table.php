<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;


class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_link')->nullable();
            $table->string('image_thumb')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $directory = 'public/photos/';
        $directoryEmpty = 'public/photos-empty/';

        $files = Storage::files($directory);
        Storage::delete($files);

        $files = Storage::files($directoryEmpty);

        foreach ($files as $file) {
            Storage::copy($file, '/public/photos/' . basename($file));
        }

        Schema::dropIfExists('images');
    }
}

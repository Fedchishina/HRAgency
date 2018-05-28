<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsInfoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'persons_info';

    /**
     * Run the migrations.
     * @table persons_info
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('image_id')->nullable()->default(null);
            $table->unsignedInteger('person_id');

            $table->index(["image_id"], 'persons_info_image_id_foreign');

            $table->index(["person_id"], 'persons_info_person_id_foreign');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('image_id', 'persons_info_image_id_foreign')
                ->references('id')->on('images')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('person_id', 'persons_info_person_id_foreign')
                ->references('id')->on('persons')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}

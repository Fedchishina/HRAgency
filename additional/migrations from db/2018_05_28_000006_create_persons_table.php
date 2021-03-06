<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'persons';

    /**
     * Run the migrations.
     * @table persons
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('parent', 64);
            $table->tinyInteger('children')->default('1');
            $table->unsignedInteger('salary_id')->default('1');

            $table->index(["salary_id"], 'persons_salary_id_foreign');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('salary_id', 'persons_salary_id_foreign')
                ->references('id')->on('salary')
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

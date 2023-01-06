<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('Название события');
            $table->text('description')->nullable()->comment('Описание события');
            $table->dateTime('date')->comment('Дата события');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('university_events');
    }
}

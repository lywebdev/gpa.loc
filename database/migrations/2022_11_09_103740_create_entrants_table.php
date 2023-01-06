<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrants', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50)->index()->comment('Имя');
            $table->string('surname', 50)->index()->comment('Фамилия');
            $table->string('patronymic', 50)->index()->nullable()->comment('Отчество');
            $table->string('birthdate')->nullable()->comment('Дата рождения абитуриента');
//            $table->string('birthplace', 255)->nullable()->comment('Место рождения');

            $table->string('citizenship')->nullable()->comment('Гражданство');
            $table->string('passport_number', 25)->index()->nullable()->comment('Номер паспорта');
            $table->string('phone', 25)->index()->nullable()->comment('Номер телефона');
            $table->string('email', 255)->index()->comment('Email');

            $table->bigInteger('user_id')->nullable()->comment('ID пользователя в системе');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrants');
    }
}

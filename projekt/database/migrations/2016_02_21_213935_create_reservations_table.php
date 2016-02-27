<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('reservations', function(Blueprint $table) {
                $table->increments('id');
                $table->string('imie');
$table->string('nazwisko');
$table->string('email');
$table->date('data_od');
$table->date('data_do');
$table->dateTime('moment_rezerwacji');
$table->boolean('wypozyczono');
$table->integer('samochod_id');
$table->float('do_zaplaty_lacznie');

                $table->timestamps();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations');
    }

}

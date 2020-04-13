<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('Date');
            $table->string('Hour');
            $table->string('Guests');
            $table->unsignedBigInteger('school_id')->unsigned();
            $table->unsignedBigInteger('visitante_id')->unsigned();
            $table->unsignedBigInteger('receptor_id')->unsigned();

            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('escuelas')->onDelete('cascade');
            $table->foreign('visitante_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receptor_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

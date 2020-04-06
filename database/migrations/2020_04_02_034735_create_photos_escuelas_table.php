<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_escuelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo');
            $table->unsignedBigInteger('escuela_id')->unsigned();
            $table->timestamps();
            $table->foreign('escuela_id')->references('id')->on('escuelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_escuelas');
    }
}

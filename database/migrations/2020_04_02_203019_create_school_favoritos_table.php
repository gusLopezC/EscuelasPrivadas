<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_favoritos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('escuela_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('escuela_id')->references('id')->on('escuelas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_favoritos');
    }
}

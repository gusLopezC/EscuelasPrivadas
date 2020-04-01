<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comentario')->nullable();
            $table->integer('calification')->nullable();
            $table->integer('calificationutil')->nullable();
            $table->unsignedBigInteger('escuela_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();

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
        Schema::dropIfExists('comentarios');
    }
}

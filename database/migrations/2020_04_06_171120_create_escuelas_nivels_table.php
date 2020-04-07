<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscuelasNivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas_nivels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('escuela_id');
            $table->boolean('guarderia')->default(false);
            $table->boolean('preescolar')->default(false);
            $table->boolean('primarias')->default(false);
            $table->boolean('secundarias')->default(false);
            $table->boolean('preparatorias')->default(false);
            $table->boolean('universidades')->default(false);
            $table->boolean('otras')->default(false);
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
        Schema::dropIfExists('escuelas_nivels');
    }
}

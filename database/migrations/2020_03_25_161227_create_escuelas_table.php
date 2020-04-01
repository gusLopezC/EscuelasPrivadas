<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->string('categoria')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('coordenadasGoogle')->nullable();
            $table->longText('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('redsocial')->nullable();
            $table->text('services')->nullable();
            $table->boolean('verificado')->default(false);
            $table->float('nivelpromo')->default(2);
            $table->float('calification')->default(5);
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->timestamps();
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
        Schema::dropIfExists('escuelas');
    }
}

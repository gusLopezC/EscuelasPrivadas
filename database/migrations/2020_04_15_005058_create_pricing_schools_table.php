<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('precio');
            $table->unsignedBigInteger('school_id')->unsigned();

            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('escuelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_schools');
    }
}

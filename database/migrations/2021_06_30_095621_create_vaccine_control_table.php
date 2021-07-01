<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_control', function (Blueprint $table) {
            $table->id();
            $table->date('date_vaccine');
            $table->unsignedBigInteger('animalCode_id')->nullable();
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                  ->onDelete('set null')->onUpdate('cascade');;
            $table->unsignedBigInteger('vaccine_id')->nullable();
            $table->foreign('vaccine_id')->references('id')->on('vaccine')
                  ->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('vaccine_control');
    }
}

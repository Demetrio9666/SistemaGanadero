<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDewormingControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deworming_control', function (Blueprint $table) {
            $table->id();
            $table->date('date_d');
            $table-> unsignedBigInteger('animalCode_id');
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');
                  
            $table-> unsignedBigInteger('deworming_id')
                  ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('deworming_id')->references('id')->on('dewormer');
            $table->date('date_vr');
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
        Schema::dropIfExists('deworming_control');
    }
}
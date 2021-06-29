<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAnimaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_animale', function (Blueprint $table) {
            $table->id();
            $table->string('animalCode',100)->unique();
            $table->date('date_n');
            $table->unsignedBigInteger('race_id');
            $table->foreign('race_id')->references('id')->on('race');
            $table->integer('purity');
            $table->string('sex',10);
            $table->string('stage',10);
            $table->integer('age_month');
            $table->string('health_condition',10);
            $table->string('gestation_state',10);
            $table->string('actual_state',10);
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('location');        
            $table->string('conceived',10);   
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
        Schema::dropIfExists('file_animale');
    }
}

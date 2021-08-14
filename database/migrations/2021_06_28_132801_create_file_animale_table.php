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
            $table->string('animalCode')->unique();
            $table->string('url');
            $table->date('date');
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('race')
                            ->onDelete('set null')
                            ->onUpdate('cascade');
            $table->string('sex',10);
            $table->string('stage',20);
            $table->string('source',20);
            $table->integer('age_month');
            $table->string('health_condition',20);
            $table->string('gestation_state',20);
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('location')
            ->onDelete('set null')
            ->onUpdate('cascade');     
            $table->string('conceived',25);   
            $table->string('actual_state');
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

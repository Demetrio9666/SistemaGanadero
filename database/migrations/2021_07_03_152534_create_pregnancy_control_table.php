<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnancyControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_control', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id');
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
			      ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('vitamin_id')->nullable();
            $table->foreign('vitamin_id')->references('id')->on('vitamin')
                  ->onDelete('set null')->onUpdate('cascade');
           
            $table->string('alternative1')->nullable();
           

            $table->string('alternative2')->nullable();
            

            $table->text('observation')->nullable();
            $table->date('date_r');
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
        Schema::dropIfExists('pregnancy_control');
    }
}

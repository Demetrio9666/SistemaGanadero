<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_treatment', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id');
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('disease',20);
            $table->text('detail')->nullable();

            $table->unsignedBigInteger('antibiotic_id')->nullable();
            $table->foreign('antibiotic_id')->references('id')->on('antibiotic')
                  ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('vitamin_id')->nullable();
            $table->foreign('vitamin_id')->references('id')->on('vitamin')
                  ->onDelete('set null')->onUpdate('cascade');
            $table->string('recovery');
            $table->text('treatment');
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
        Schema::dropIfExists('file_treatment');
    }
}

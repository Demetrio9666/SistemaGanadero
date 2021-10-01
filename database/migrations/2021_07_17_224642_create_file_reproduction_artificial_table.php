<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileReproductionArtificialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_reproduction_artificial', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id_m');
            $table->foreign('animalCode_id_m')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table-> unsignedBigInteger('artificial_id')->nullable();
            $table->foreign('artificial_id')->references('id')->on('artificial_reproduction')
                  ->onDelete('set null')->onUpdate('cascade');
            $table->string('reproduction_state');
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
        Schema::dropIfExists('file_reproduction_artificial');
    }
}

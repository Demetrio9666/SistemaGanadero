<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileReproductionInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_reproduction_internal', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id_m');
            $table->foreign('animalCode_id_m')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table-> unsignedBigInteger('animalCode_id_p');
            $table->foreign('animalCode_id_p')->references('id')->on('file_animale')
                    ->onDelete('cascade')->onUpdate('cascade');
                    
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
        Schema::dropIfExists('file_reproduction_internal');
    }
}

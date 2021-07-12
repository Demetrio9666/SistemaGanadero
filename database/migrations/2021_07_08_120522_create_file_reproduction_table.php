<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileReproductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_reproduction', function (Blueprint $table) {
            $table->id();
            $table->date('date_r');
            $table-> unsignedBigInteger('animalCode_id_m');
            $table->foreign('animalCode_id_m')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table-> unsignedBigInteger('animalCode_id_p')->nullable();
            $table->foreign('animalCode_id_p')->references('id')->on('file_animale')
                    ->onDelete('set null')->onUpdate('cascade');

            $table-> unsignedBigInteger('artificial_id')->nullable();
            $table->foreign('artificial_id')->references('id')->on('artificial_reproduction')
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
        Schema::dropIfExists('file_reproduction');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalMountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_mount', function (Blueprint $table) {
            $table->id();
            $table->date('date_r');
            $table-> unsignedBigInteger('animalCode_id')->nullable();
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                    ->onDelete('set null')->onUpdate('cascade');

            $table->string('animalCode_Exte');
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('race')
                  ->onDelete('set null')->onUpdate('cascade');
            $table->string('age_month');
            $table->string('sex');
            $table->string('hacienda_name');
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
        Schema::dropIfExists('external_mount');
    }
}

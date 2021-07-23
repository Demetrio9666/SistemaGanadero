<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtificialReproductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artificial_reproduction', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('race')
                   ->onDelete('set null')
                   ->onUpdate('cascade');

            $table->string('reproduccion',10);
            $table->string('supplier');
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
        Schema::dropIfExists('artificial_reproduction');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubHealthSpeechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_health_speeches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_tipics_id');
            $table->string('sub_hs_title');
            $table->string('sub_hs_image')->nullable();
            $table->longText('sub_hs_description')->nullable();
            $table->integer('status')->default(1);
            $table->foreign('hs_tipics_id')->references('id')->on('health_speeches');
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
        Schema::dropIfExists('sub_health_speeches');
    }
}

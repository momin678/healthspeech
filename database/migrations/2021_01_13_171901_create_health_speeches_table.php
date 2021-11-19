<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthSpeechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_speeches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_tipics_id');
            $table->string('hs_title');
            $table->string('hs_image');
            $table->longText('hs_description');
            $table->string('hs_meta_title')->nullable();
            $table->string('hs_meta_tages')->nullable();
            $table->mediumText('hs_meta_description')->nullable();
            $table->text('hs_meta_keywords')->nullable();
            $table->integer('status')->default(1);
            $table->foreign('hs_tipics_id')->references('id')->on('health_topics');
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
        Schema::dropIfExists('health_speeches');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_h_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_hs_topics_id');
            $table->string('sub_sub_hs_title');
            $table->string('sub_sub_hs_image')->nullable();
            $table->longText('sub_sub_hs_description')->nullable();
            $table->integer('status')->default(1);
            $table->foreign('sub_hs_topics_id')->references('id')->on('sub_health_speeches');
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
        Schema::dropIfExists('sub_sub_h_s');
    }
}

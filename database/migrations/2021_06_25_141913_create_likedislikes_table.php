<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likedislikes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ques_id');
            $table->bigInteger('user_id');
            $table->bigInteger('ques_like')->nullable();
            $table->bigInteger('ques_dislike')->nullable();
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
        Schema::dropIfExists('likedislikes');
    }
}

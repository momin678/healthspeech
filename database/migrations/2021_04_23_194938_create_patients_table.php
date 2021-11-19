<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('userPicture');
            $table->string('country');
            $table->string('city');
            $table->string('gender');
            $table->date('birthday');
            $table->string('hightsEduction');
            $table->string('ocupation');
            $table->integer('phone');
            $table->string('address');
            $table->text('aboutme');
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
        Schema::dropIfExists('patients');
    }
}

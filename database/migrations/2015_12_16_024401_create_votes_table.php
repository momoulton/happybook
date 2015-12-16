<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('ballot_id')->unsigned()->nullable();
          $table->foreign('ballot_id')->references('id')->on('ballots');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('first_choice')->unsigned()->nullable();
          $table->integer('second_choice')->unsigned()->nullable();
          $table->integer('third_choice')->unsigned()->nullable();
          $table->integer('fourth_choice')->unsigned()->nullable();
          $table->integer('fifth_choice')->unsigned()->nullable();
          $table->integer('sixth_choice')->unsigned()->nullable();
          $table->integer('seventh_choice')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}

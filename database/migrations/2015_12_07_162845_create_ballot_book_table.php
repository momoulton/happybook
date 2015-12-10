<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBallotBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballot_book', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('ballot_id')->unsigned()->nullable();
          $table->integer('book_id')->unsigned()->nullable();
          $table->foreign('ballot_id')->references('id')->on('ballots');
          $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ballot_book');
    }
}

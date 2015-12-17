<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('user_id')->unsigned()->nullable();
          $table->integer('group_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_group');
    }
}

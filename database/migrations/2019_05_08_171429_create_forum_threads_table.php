<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('forum_id')->unsigned();
            $table->string('name');
            $table->mediumText('content');
            $table->timestamps();
        });
        
        Schema::table('forum_threads', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('forum_id')->references('id')->on('forum_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_threads');
    }
}

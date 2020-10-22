<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_views', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments("id");

            $table->string("url");
            $table->string("session_id");
            $table->string("ip");
            $table->string("agent");

            $table->foreignId('user_id')->index()->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('post_id')->index()->nullable()->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('posts_views');
    }
}

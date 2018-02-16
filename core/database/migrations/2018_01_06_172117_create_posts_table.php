<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug', 200)->unique();
            $table->text('body');
            $table->string('image');
            $table->boolean('guest');
            $table->integer('user_id');
            $table->string('seo_title');
            $table->text('seo_description');
            $table->string('seo_keywords');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('posts');
    }

}

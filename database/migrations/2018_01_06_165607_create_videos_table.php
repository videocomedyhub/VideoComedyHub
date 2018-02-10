<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('video_id',20)->unique();
            $table->string('title');
            $table->string('slug',200)->unique();
            $table->string('duration',10);
            $table->text('description');
            $table->integer('channel_id');
            $table->string('default_thumbnail')->nullable();
            $table->string('medium_thumbnail')->nullable();
            $table->string('high_thumbnail')->nullable();
            $table->string('seo_title');
            $table->text('seo_description');
            $table->boolean('active');
            $table->boolean('featured');
            $table->integer('count');
            $table->string('platform');
            $table->dateTime('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('videos');
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('channels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('channel_id', 50)->unique();
            $table->string('title');
            $table->string('slug', 200)->unique();
            $table->text('description');
            $table->char('region',2);
            $table->integer('user_id');
            $table->string('default_thumbnail')->nullable();
            $table->string('medium_thumbnail')->nullable();
            $table->string('high_thumbnail')->nullable();
            $table->string('seo_title');
            $table->text('seo_description');
            $table->boolean('active');
            $table->boolean('featured');
            $table->string('frequency')->nullable();  // still need to find the best datatype for this column
            $table->dateTime('published_at')->nullable();
            $table->dateTime('last_fetched')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('channels');
    }

}

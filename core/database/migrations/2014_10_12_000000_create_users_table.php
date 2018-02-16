<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 100)->unique();
            $table->string('username',50)->unique();
            $table->string('password');
            $table->string('region')->nullable();
            $table->boolean('active');
            $table->boolean('confirmed');
            $table->string('provider');
            $table->string('provider_token')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('tagline')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('web')->nullable();
            $table->string('youtube')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
// $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
}

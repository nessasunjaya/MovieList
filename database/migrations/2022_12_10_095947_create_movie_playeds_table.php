<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviePlayedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_playeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("movie_id");
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->unsignedBigInteger("actor_id");
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->string('character_name');

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
        Schema::dropIfExists('movie_playeds');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_movie', function (Blueprint $table) {

            $table->integer('movie_id')->unsigned();
            $table->integer('person_id')->unsigned();

            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('person_id')->references('id')->on('people');
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
        Schema::dropIfExists('movie_actors');
    }
}

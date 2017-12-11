<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_movie', function (Blueprint $table) {

            $table->integer('movie_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->engine='InnoDB';

            $table->timestamps();
        });
        Schema::table('director_movie', function (Blueprint $table){
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_directors');
    }
}

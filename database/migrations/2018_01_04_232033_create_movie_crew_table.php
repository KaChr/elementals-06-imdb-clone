<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieCrewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_crew', function (Blueprint $table) {

            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')
            ->on('movies')->onDelete('cascade');

            $table->integer('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')
            ->on('jobs')->onDelete('cascade');

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
        Schema::dropIfExists('movie_crew');
    }
}

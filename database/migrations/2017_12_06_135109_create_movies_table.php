<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->date('release_date')->nullable();
            $table->string('runtime')->nullable();
            $table->float('rating')->nullable();
            $table->text('poster')->nullable();
            $table->string('countries')->nullable();
            $table->string('imdbID')->nullable();
            $table->string('movieBackdrop')->nullable();
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table){
            //$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}

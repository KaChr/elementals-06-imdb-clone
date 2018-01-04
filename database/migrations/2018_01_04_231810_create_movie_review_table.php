<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_review', function (Blueprint $table) {

            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')
            ->on('movies')->onDelete('cascade');

            $table->integer('review_id')->unsigned();
            $table->foreign('review_id')->references('id')
            ->on('reviews')->onDelete('cascade');

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
        Schema::dropIfExists('movie_review');
    }
}

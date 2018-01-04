<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActoractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_movie', function (Blueprint $table) {

            $table->integer('actor_id')->unsigned();
            $table->foreign('actor_id')->references('id')
            ->on('actors')->onDelete('cascade');

            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')
            ->on('movies')->onDelete('cascade');

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
        Schema::dropIfExists('actor_actor');
    }
}

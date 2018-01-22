<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('season_id')->unsigned();
            $table->integer('episode_nr')->nullable();
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->float('rating')->nullable();
            $table->string('airdate')->nullable();
            $table->text('backdrop')->nullable();
            $table->timestamps();
        });

        Schema::table('episodes', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('season_id')->references('item_id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}

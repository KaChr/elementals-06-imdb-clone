<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_item', function (Blueprint $table) {
            
            $table->integer('item_id')->nullable()->unsigned();
            $table->integer('genre_id')->nullable()->unsigned();
            $table->engine='innoDB';
            $table->timestamps();
        });
        Schema::table('genre_item', function (Blueprint $table) {
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_item');
    }
}

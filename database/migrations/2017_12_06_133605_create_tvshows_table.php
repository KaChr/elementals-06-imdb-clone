<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvshows', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->date('year')->nullable();
            $table->string('runtime')->nullable();
            $table->float('rating')->nullable();
            $table->timestamps();
        });

        Schema::table('tvshows', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tvshows');
    }
}

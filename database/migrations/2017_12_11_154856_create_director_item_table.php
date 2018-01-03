<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_item', function (Blueprint $table) {

            $table->integer('item_id')->nullable()->unsigned();
            $table->integer('person_id')->nullable()->unsigned();
            $table->engine='InnoDB';

            $table->timestamps();
        });
        Schema::table('director_item', function (Blueprint $table){
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('director_item');
    }
}

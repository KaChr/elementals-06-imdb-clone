<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorCharacterItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_character_item', function (Blueprint $table) {

            $table->integer('item_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->integer('character_id')->unsigned()->nullable();
            $table->engine='InnoDB';

            $table->timestamps();
        });
        Schema::table('actor_character_item', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_character_item');
    }
}

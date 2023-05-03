<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->date('release_date')->nullable();
            $table->float('price')->default(0);
            $table->float('price_sell')->nullable();
            $table->foreignId('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreignId('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreignId('studio_id')->references('id')->on('studios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameBuyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_buyers', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->useCurrent();
            $table->foreignId('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_buyer');
    }
}

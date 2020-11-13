<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
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
            $table->foreignId("player1")->references("id")->on("users");
            $table->foreignId("player2")->references("id")->on("users");
            $table->foreignId("player3")->references("id")->on("users");
            $table->foreignId("player4")->references("id")->on("users");

            $table->unsignedInteger("scorelimit");
            $table->unsignedInteger("scoreteam1");
            $table->unsignedInteger("scoreteam2");
            $table->enum("gamestate", ["CREATED", "ABORTED", "PLAYING", "WONTEAM1", "WONTEAM2"]);
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
        Schema::dropIfExists('game');
    }
}

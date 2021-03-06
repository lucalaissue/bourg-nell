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
        Schema::disableForeignKeyConstraints();

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId("player1")->references("id")->on("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("player2")->references("id")->on("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("player3")->references("id")->on("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("player4")->references("id")->on("users")->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger("scorelimit");
            $table->unsignedInteger("scoreteam1")->default(0);
            $table->unsignedInteger("scoreteam2")->default(0);
            $table->tinyInteger("gamestate")->default(0);
            $table->timestamps();            
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('games');
        Schema::enableForeignKeyConstraints();
    }
}

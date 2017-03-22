<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->default('');
            $table->date('start_date');
            $table->date('end_date')->nullable();
        });

        Schema::create('divisions', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          
          $table->string('name')->default('');
          $table->string('slug')->default('');
          $table->integer('position')->unsigned()->default(0);
        });
        
        Schema::create('players', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();

          $table->string('name')->default('');
          $table->string('slug')->default('');
          
          $table->integer('division_id')->unsigned()->default(0);
          $table->foreign('division_id')->references('id')->on('division_id');
        });

        Schema::create('results', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();

          $table->integer('win')->default(0);
          $table->integer('loss')->default(0);
          $table->integer('draw')->default(0);
          $table->integer('mov')->default(0);

          $table->integer('season_id')->unsigned()->default(0);
          $table->foreign('season_id')->references('id')->on('seasons');
          $table->integer('player_id')->unsigned()->default(0);
          $table->foreign('player_id')->references('id')->on('players');
        });

        Schema::create('matches', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();

          $table->date('date-played');
          $table->integer('player_one_score');
          $table->integer('player_two_score');
          
          $table->integer('player_one_id')->unsigned()->default(0);
          $table->foreign('player_one_id')->references('id')->on('players');
          $table->integer('player_two_id')->unsigned()->default(0);
          $table->foreign('player_two_id')->references('id')->on('players');
          $table->integer('season_played')->unsigned()->default(0);
          $table->foreign('season_played')->references('id')->on('seasons');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('players');
        Schema::dropIfExists('results');
        Schema::dropIfExists('matches');
    }
}

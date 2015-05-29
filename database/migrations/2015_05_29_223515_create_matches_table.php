<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('league_id');
            $table->integer('tournament_id');
            $table->integer('team_blue_id');
            $table->integer('team_red_id');
            $table->integer('team_winner_id');
            $table->integer('polldaddy_id');
            $table->dateTime('date_time');
            $table->string('url');
            $table->string('name');
            $table->tinyInteger('score_blue');
            $table->tinyInteger('score_red');

            $table->tinyInteger('max_games');

            $table->boolean('is_live');
            $table->boolean('is_finished');

            $table->timestamps();

            $table->primary('id');
            $table->index('league_id');
            $table->index('tournament_id');
            $table->index('team_blue_id');
            $table->index('team_red_id');
            $table->index('team_winner_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matches');
	}

}

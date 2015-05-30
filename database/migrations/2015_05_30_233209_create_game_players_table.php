<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_players', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('league_id');
            $table->integer('tournament_id');
            $table->integer('match_id');
            $table->integer('team_id');
            $table->integer('player_id');
            $table->integer('champion_id');

            $table->integer('stat_kda');
            $table->integer('stat_kills');
            $table->integer('stat_deaths');
            $table->integer('stat_assists');
            $table->integer('stat_endLevel');
            $table->integer('stat_minionsKilled');
            $table->integer('stat_totalGold');
            $table->integer('stat_spell0');
            $table->integer('stat_spell1');
            $table->integer('stat_items0');
            $table->integer('stat_items1');
            $table->integer('stat_items2');
            $table->integer('stat_items3');
            $table->integer('stat_items4');
            $table->integer('stat_items5');

            $table->timestamps();

            $table->primary('id');
            $table->index('league_id');
            $table->index('tournament_id');
            $table->index('match_id');
            $table->index('team_id');
            $table->index('player_id');
            $table->index('champion_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('game_players');
	}

}

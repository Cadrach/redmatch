<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('league_id');
            $table->integer('tournament_id');
            $table->integer('match_id');
            $table->integer('team_winner_id');
            $table->integer('team_blue_id');
            $table->integer('team_red_id');
            $table->dateTime('date_time');
            $table->boolean('has_vod');
            $table->boolean('no_vods');
            $table->text('legs_url');
            $table->longText('legs_data');
            $table->string('patch');
            $table->integer('length');
            $table->tinyInteger('order');

            $table->timestamps();

            $table->primary('id');
            $table->index('league_id');
            $table->index('tournament_id');
            $table->index('match_id');
            $table->index('team_winner_id');
            $table->index('team_blue_id');
            $table->index('team_red_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');
	}

}

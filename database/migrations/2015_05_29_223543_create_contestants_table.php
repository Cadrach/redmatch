<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contestants', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('league_id');
            $table->integer('tournament_id');
            $table->integer('team_id');

            $table->timestamps();

            $table->primary('id');
            $table->index('league_id');
            $table->index('tournament_id');
            $table->index('team_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contestants');
	}

}

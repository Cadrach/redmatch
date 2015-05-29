<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournaments', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('league_id');
            $table->text('name');
            $table->integer('season');
            $table->date('dateBegin');
            $table->date('dateEnd');
            $table->boolean('no_vod');
            $table->boolean('finished');
            $table->boolean('published');
            $table->timestamps();

            $table->primary('id');
            $table->index('league_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournaments');
	}

}

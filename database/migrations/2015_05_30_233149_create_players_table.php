<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function(Blueprint $table)
		{
            $table->integer('id');
            $table->integer('team_id');
            $table->tinyInteger('role_id');
            $table->string('name');
            $table->longText('bio');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile_url');
            $table->string('photo_url');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->boolean('is_starter');
            $table->dateTime('contract_expiration');

            $table->timestamps();
            $table->primary('id');
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
		Schema::drop('players');
	}

}

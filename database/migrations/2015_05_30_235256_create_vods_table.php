<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vods', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('game_id');
            $table->string('type_id');
            $table->string('type');
            $table->bigInteger('weight');
            $table->string('url');
            $table->longText('data');

            $table->timestamps();
            $table->index('game_id');
            $table->index('type_id');
            $table->unique(['url', 'game_id']);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vods');
	}

}

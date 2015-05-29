<?php
/**
 * Command to generate the file:
 * php artisan make:migration create_leagues_table --create leagues
 *
 * Command to run the migration
 * php artisan migrate
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('leagues', function(Blueprint $table)
		{
			//
            $table->integer('id');
            $table->string('name');
            $table->text('image');
            $table->text('url');
            $table->string('color');
            $table->integer('weight');
            $table->boolean('published');
            $table->longtext('data');
            $table->timestamps();

            $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('leagues');
	}

}

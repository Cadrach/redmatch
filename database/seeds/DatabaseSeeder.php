<?php

include 'LeaguesTableSeeder.php';
include 'TournamentsTableSeeder.php';
include 'MatchesTableSeeder.php';
include 'GamesTableSeeder.php';
include 'VodsTableSeeder.php';

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('LeaguesTableSeeder');
		$this->call('TournamentsTableSeeder');
		$this->call('MatchesTableSeeder');
		$this->call('GamesTableSeeder');
		$this->call('VodsTableSeeder');
	}

}

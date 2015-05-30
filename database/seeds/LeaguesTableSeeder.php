<?php

use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('leagues')->delete();
        
		\DB::table('leagues')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'NA LCS',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/NA_LCS_Logo_RGB_72dpi.png',
				'url' => 'http://na.lolesports.com/na-lcs',
				'color' => '#1376A4',
				'weight' => 10,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:55',
				'updated_at' => '2015-05-29 23:53:27',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'EU LCS',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/EU_LCS_Logo_RGB_72dpi.png',
				'url' => 'http://na.lolesports.com/eu-lcs',
				'color' => '#CA3B3B',
				'weight' => 11,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:55',
				'updated_at' => '2015-05-29 23:53:28',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'All-Star',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/ASG_logo.png',
				'url' => 'http://na.lolesports.com/all-star',
				'color' => '#D5A235',
				'weight' => 30,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Worlds',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/WC_2014_Logo-1_0.png',
				'url' => 'http://na.lolesports.com/worlds',
				'color' => '#a0a0a0',
				'weight' => 50,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			4 => 
			array (
				'id' => 6,
				'name' => 'na-cs',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/NA_CS_logo.png',
				'url' => 'http://na.lolesports.com/na-cs',
				'color' => '#2c9fc6',
				'weight' => 20,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			5 => 
			array (
				'id' => 7,
				'name' => 'eu-cs',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/EU_CS_logo.png',
				'url' => 'http://na.lolesports.com/eu-cs',
				'color' => '#e3662b',
				'weight' => 21,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			6 => 
			array (
				'id' => 8,
				'name' => 'lck',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/OGNCHAMPIONS_white.png',
				'url' => 'http://na.lolesports.com/lck',
				'color' => '#6f678f',
				'weight' => 12,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			7 => 
			array (
				'id' => 9,
				'name' => 'lpl-china',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/LPL_logo.png',
				'url' => 'http://na.lolesports.com/lpl-china',
				'color' => '#666666',
				'weight' => 13,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			8 => 
			array (
				'id' => 12,
				'name' => 'LMS',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/LMS_logo.png',
				'url' => 'http://na.lolesports.com/lms',
				'color' => '#990000',
				'weight' => 15,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
			9 => 
			array (
				'id' => 14,
				'name' => 'MSI',
				'image' => 'http://riot-web-cdn.s3-us-west-1.amazonaws.com/lolesports/s3fs-public/MSI_LOGO.png',
				'url' => 'http://na.lolesports.com/msi',
				'color' => '#f1b167',
				'weight' => 35,
				'published' => 1,
				'data' => '',
				'created_at' => '2015-05-29 23:00:56',
				'updated_at' => '2015-05-29 23:53:28',
			),
		));
	}

}

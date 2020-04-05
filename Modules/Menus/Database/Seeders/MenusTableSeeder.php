<?php namespace Modules\Menus\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class MenusTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('menus')->truncate();

		$menus = [
			[
				'id' => '1',
				'name'=>'Main',
				'slug'=>'main',
				'status' => 1,
			],
			[
				'id' => '2',
				'name'=>'Footer',
				'slug'=>'footer',
				'status' => 1,
			]
		];
		DB::table('menus')->insert( $menus );
	}

}
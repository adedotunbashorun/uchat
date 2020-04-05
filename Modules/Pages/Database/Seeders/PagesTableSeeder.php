<?php namespace Modules\Pages\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class PagesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
        DB::table('pages')->truncate();

        $pages = [
            [
                'id' => '1',
                'parent_id' => null,
                'is_home' => '1',
                'template' => 'home',
                'slug' => '/',
                'uri' => '/',
                'title' => 'Home',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],            
            [
                'id' => '2',
                'parent_id' => null,
                'is_home' => '0',
                'template' => 'about',
                'slug' => 'about-us',
                'uri' => 'about-us',
                'title' => 'About Us',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],
            [
                'id' => '3',
                'parent_id' => 2,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'our-vision',
                'uri' => 'about-us/our-vision',
                'title' => 'Our Vision',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],
            [
                'id' => '4',
                'parent_id' => 2,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'our-mission',
                'uri' => 'about-us/our-mission',
                'title' => 'Our Mission',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],
            [
                'id' => '5',
                'is_home' => '0',
                'parent_id' => null,
                'template' => 'default',
                'slug' => 'media',
                'uri' => 'media',
                'title' => 'Media',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],         
            [
                'id' => '6',
                'parent_id' => 5,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'photo-gallery',
                'uri' => 'media/photo-gallery',
                'title' => 'Photo Gallery',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],       
            [
                'id' => '7',
                'parent_id' => 5,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'events',
                'uri' => 'media/events',
                'title' => 'Events',
                'module' => 'events',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],       
            [
                'id' => '8',
                'parent_id' => 5,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'messages',
                'uri' => 'media/messages',
                'title' => 'Messages',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],      
            [
                'id' => '9',
                'parent_id' => 5,
                'is_home' => '0',
                'template' => 'default',
                'slug' => 'testimonials',
                'uri' => 'media/testimonials',
                'title' => 'Testimonials',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ],  
            [
                'id' => '10',
                'is_home' => '0',
                'parent_id' => null,
                'template' => 'contact',
                'slug' => 'contact-us',
                'uri' => 'contact-us',
                'title' => 'Contact Us',
                'module' => '',
                'created_at' => '2015-06-25 21:57:44',
                'updated_at' => '2015-06-25 20:26:35',
            ]
        ];
        DB::table('pages')->insert( $pages );
    }

}
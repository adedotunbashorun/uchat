<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Sentry;

class GroupsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        \DB::table('groups')->truncate();
        Sentry::getGroupProvider()->create(
            [
                'name'        => 'Admin',
                'permissions' => [
                    /* Dashboard */
                    'dashboard.index' => 1,
                    /* Banners */
                    'banners.index' => 1,
                    'banners.create' => 1,
                    'banners.store' => 1,
                    'banners.edit' => 1,
                    'banners.update' => 1,
                    'banners.destroy' => 1,
                    /* Blocks */
                    'blocks.index' => 1,
                    'blocks.create' => 1,
                    'blocks.store' => 1,
                    'blocks.edit' => 1,
                    'blocks.update' => 1,
                    'blocks.destroy' => 1,
                    /* News */
                    'news.index' => 1,
                    'news.create' => 1,
                    'news.store' => 1,
                    'news.edit' => 1,
                    'news.update' => 1,
                    'news.destroy' => 1,
                    /* FAQS */
                    'faqs.index' => 1,
                    'faqs.create' => 1,
                    'faqs.store' => 1,
                    'faqs.edit' => 1,
                    'faqs.update' => 1,
                    'faqs.destroy' => 1,
                    /* Posts */
                    'posts.index' => 1,
                    'posts.create' => 1,
                    'posts.store' => 1,
                    'posts.edit' => 1,
                    'posts.update' => 1,
                    'posts.destroy' => 1,
                    'post.categories.index' => 1,
                    'post.categories.create' => 1,
                    'post.categories.store' => 1,
                    'post.categories.edit' => 1,
                    'post.categories.update' => 1,
                    'post.categories.destroy' => 1,
                    /* TEstimonials */
                    'testimonials.index' => 1,
                    'testimonials.create' => 1,
                    'testimonials.store' => 1,
                    'testimonials.edit' => 1,
                    'testimonials.update' => 1,
                    'testimonials.destroy' => 1,
                    /* Videos */
                    'videos.index' => 1,
                    'videos.create' => 1,
                    'videos.store' => 1,
                    'videos.edit' => 1,
                    'videos.update' => 1,
                    'videos.destroy' => 1,
                    /* Teams */
                    'teams.index' => 1,
                    'teams.create' => 1,
                    'teams.store' => 1,
                    'teams.edit' => 1,
                    'teams.update' => 1,
                    'teams.destroy' => 1,
                    /* Galleries */
                    'galleries.index' => 1,
                    'galleries.create' => 1,
                    'galleries.store' => 1,
                    'galleries.edit' => 1,
                    'galleries.update' => 1,
                    'galleries.destroy' => 1,
                    /* Roles */
                    'users.roles.index' => 1,
                    'users.roles.create' => 1,
                    'users.roles.store' => 1,
                    'users.roles.edit' => 1,
                    'users.roles.update' => 1,
                    'users.roles.destroy' => 1,
                    /* Users */
                    'users.index' => 1,
                    'users.create' => 1,
                    'users.store' => 1,
                    'users.edit' => 1,
                    'users.update' => 1,
                    'users.destroy' => 1,
                    /* Menu */
                    'menus.index' => 1,
                    'menus.create' => 1,
                    'menus.store' => 1,
                    'menus.edit' => 1,
                    'menus.update' => 1,
                    'menus.destroy' => 1,
                    'menus.menu_links.index' => 1,
                    'menus.menu_links.create' => 1,
                    'menus.menu_links.store' => 1,
                    'menus.menu_links.edit' => 1,
                    'menus.menu_links.update' => 1,
                    'menus.menu_links.destroy' => 1,
                    /* Settings */
                    'settings.index' => 1,
                    'settings.store' => 1,
                    /* Page */
                    'pages.index' => 1,
                    'pages.create' => 1,
                    'pages.store' => 1,
                    'pages.edit' => 1,
                    'pages.update' => 1,
                    'pages.destroy' => 1,
                ]
            ]
        );


        /*Sentry::getGroupProvider()->create(
            [
                'name'        => 'Parent',
                //'permissions' => ['admin' => 1,'u'],
            ]
        );*/

		
		// $this->call("OthersTableSeeder");
	}

}
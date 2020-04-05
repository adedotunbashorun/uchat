<?php namespace Modules\Users\Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SentinelGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $groups = Sentinel::getRoleRepository();

        // Create an Admin group
        $groups->createModel()->create(
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ]
        );

        // Create an Users group
        $groups->createModel()->create(
            [
                'name' => 'User',
                'slug' => 'user',
            ]
        );

        // Create an Vendors group
        $groups->createModel()->create(
            [
                'name' => 'Artisan',
                'slug' => 'artisan',
            ]
        );

        // Save the permissions
        $group = Sentinel::findRoleBySlug('admin');
        $group->permissions = [
            /* Dashboard */
            'dashboard.index' => true,

            /* Roles */
            'users.roles.index' => true,
            'users.roles.create' => true,
            'users.roles.store' => true,
            'users.roles.edit' => true,
            'users.roles.update' => true,
            'users.roles.destroy' => true,
            /* Users */
            'users.index' => true,
            'users.create' => true,
            'users.store' => true,
            'users.edit' => true,
            'users.update' => true,
            'users.destroy' => true,
            /* Menu */
            'menus.index' => true,
            'menus.create' => true,
            'menus.store' => true,
            'menus.edit' => true,
            'menus.update' => true,
            'menus.destroy' => true,
            'menus.menu_links.index' => true,
            'menus.menu_links.create' => true,
            'menus.menu_links.store' => true,
            'menus.menu_links.edit' => true,
            'menus.menu_links.update' => true,
            'menus.menu_links.destroy' => true,
            /* Settings */
            'settings.index' => true,
            'settings.store' => true,
            /* Page */
            'pages.index' => true,
            'pages.create' => true,
            'pages.store' => true,
            'pages.edit' => true,
            'pages.update' => true,
            'pages.destroy' => true,
        ];
        $group->save();
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuLinksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_links', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('tagline')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('link_type');
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('category_id')->nullable();
            $table->string('active')->nullable();
            $table->string('category_name');
            $table->string('url')->nullable();
            $table->string('uri')->nullable();
            $table->integer('menu_id')->unsigned();
            $table->integer('position')->unsigned()->nullable();
            $table->string('target')->nullable();;
            $table->string('restricted_to');
            $table->string('class');
            $table->boolean('status')->default(0);
            $table->timestamps();

            /*$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menu_links')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_links');
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablesMatrix extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //Table States
        Schema::create('towns', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
            $table->string('observation');
            $table->timestamps();
        });

        //Table Procedures
        Schema::create('procedures', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
            $table->enum('type',['town','state']);
            $table->timestamps();
        });


        //Table Category Guides
        Schema::create('categoryguides', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });

        //Table Guides
        Schema::create('guides', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->integer('id_category_guide')->unsigned();
            $table->foreign('id_category_guide')
                ->references('id')
                ->on('categoryguides');

            $table->timestamps();
        });
        //Table Guide Procedures
        Schema::create('guideprocedures', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('id_guide')->unsigned();
            $table->foreign('id_guide')
                ->references('id')
                ->on('guides');

            $table->integer('id_procedure')->unsigned();
            $table->foreign('id_procedure')
                ->references('id')
                ->on('procedures');

            $table->integer('id_town')->unsigned();
            $table->foreign('id_town')
                ->references('id')
                ->on('towns');

            $table->string('url');
            $table->text('tags');
            $table->boolean('is_enabled');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('towns');
        Schema::drop('guideprocedures');
        Schema::drop('categoryguides');
        Schema::drop('guides');
    }

}

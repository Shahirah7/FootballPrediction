<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fixtures', function($table) {
		    $table->increments('id');
		    $table->integer('round_id');
		    $table->integer('home_team_id');
		    $table->integer('home_team_score');
		    $table->integer('away_team_id');
		    $table->integer('away_team_score');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fixtures');
	}

}

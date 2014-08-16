<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function($table) {
		    $table->increments('id');
		    $table->string('name', 255);
		    $table->date('created_at');
			$table->date('updated_at');
		});

		Schema::table('rounds', function($table) {
			$table->integer('game_id')->after('name');;
		});

		Schema::table('users', function($table) {
			$table->integer('game_id')->after('password');;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');

		Schema::table('rounds', function($table) {
			$table->dropColumn('game_id');
		});

		Schema::table('users', function($table) {
			$table->dropColumn('game_id');
		});
	}

}

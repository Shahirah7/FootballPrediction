<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fixtures', function($table) {
			$table->date('created_at');
			$table->date('updated_at');
		});

		Schema::table('rounds', function($table) {
			$table->date('created_at');
			$table->date('updated_at');
		});

		Schema::table('teams', function($table) {
			$table->date('created_at');
			$table->date('updated_at');
		});

		Schema::table('round_results', function($table) {
			$table->date('created_at');
			$table->date('updated_at');
		});

		Schema::table('user_picks', function($table) {
			$table->date('created_at');
			$table->date('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fixtures', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('rounds', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('teams', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('round_results', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('user_picks', function($table) {
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});
	}

}

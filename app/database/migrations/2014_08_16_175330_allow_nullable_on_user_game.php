<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullableOnUserGame extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE users MODIFY game_id int(11) NULL');
		DB::statement('ALTER TABLE users MODIFY final_round_id int(11) NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE users MODIFY game_id int(11)');
		DB::statement('ALTER TABLE users MODIFY final_round_id int(11)');
	}

}

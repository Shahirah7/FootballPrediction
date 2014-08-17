<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GameTableSeeder');

		$this->call('UserTableSeeder');

		$this->command->info('Database tables seeded!');
	}

}

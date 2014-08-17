<?php


class GameTableSeeder extends Seeder {

    public function run()
    {
        DB::table('games')->delete();

        $game = new Game();
		$game->name = "Game #1";
		$game->save();

        $game = new Game();
		$game->name = "Game #2";
		$game->save();

		$game = new Game();
		$game->name = "Game #3";
		$game->save();

		$game = new Game();
		$game->name = "Game #4";
		$game->save();

		$game = new Game();
		$game->name = "Game #5";
		$game->save();

    }

}
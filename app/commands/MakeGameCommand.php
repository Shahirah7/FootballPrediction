<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MakeGameCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'lts:makegame';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates a new game.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$gameName 		= $this->argument('name');
		$startingRound  = $this->argument('starting_round');

		$game = new Game();
		$game->name = "Game #" . $gameName;
		$game->save();

		for($i = $startingRound; $i <= 38; $i++) {
			$round = new Round();
			$round->name = "Round #" . $i;
			$round->game_id = $game->id;
			$round->completed = 0;
			$round->save();


			$fixtures = DB::table('fixtures_original')->where('round_id', $i)->get();
			foreach($fixtures as $fixture) {

				$gameFixture = new Fixture();
				$gameFixture->round_id = $round->id;
				$gameFixture->home_team_id = $fixture->home_team_id;
				$gameFixture->away_team_id = $fixture->away_team_id;
				$gameFixture->save();

			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('name', InputArgument::REQUIRED, 'Name of the Game.'),
			array('starting_round', InputArgument::REQUIRED, 'Starting Round.')
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}

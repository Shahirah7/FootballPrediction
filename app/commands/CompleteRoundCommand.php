<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CompleteRoundCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'lts:completeround';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Completes a Round.';

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
		$gameId    = $this->argument('game_id');
		$roundId  = $this->argument('round_id');

		$winningTeamIds = array();

		$fixtures = Fixture::where('round_id', '=', $roundId)->get();
		foreach($fixtures as $fixture) {
			if($fixture->home_team_score > $fixture->away_team_score) {
				$winningTeamIds[] = $fixture->home_team_id;
			}
			if($fixture->away_team_score > $fixture->home_team_score) {
				$winningTeamIds[] = $fixture->away_team_id;
			}
		}

		// compute round results,
		$userPicks = UserPick::where('round_id', '=', $roundId)->get();
		foreach($userPicks as $pick) {
			$user = User::find($pick->user_id);

			$roundResult = new RoundResult();
			$roundResult->round_id = $roundId;
			$roundResult->user_id = $pick->user_id;
			if(in_array($pick->team_id, $winningTeamIds)) {
				$roundResult->continue = true;
				$user->final_round_id  = $roundId;
				$user->save();
			} else {
				$roundResult->continue = false;
			}
			$roundResult->save();
		}

		// complete round
		$round = Round::find($roundId);
		$round->completed = true;
		$round->save();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('game_id', InputArgument::REQUIRED, 'ID of the Game.'),
			array('round_id', InputArgument::REQUIRED, 'ID of the Round.'),
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

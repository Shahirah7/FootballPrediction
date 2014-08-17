<?php

class AdminController extends BaseController {

	public function dashboard() {

		$round   = null;
		$gameId  = Input::get('gameId');
		$roundId = Input::get('roundId');

		$fixtures = null;
		if(!is_null($roundId)) {
			$round = Round::find($roundId);
			$fixtures = $round->fixtures()->getResults();
		}

		return View::make('admin/dashboard', array(
			'games' 	=> Game::all(),
			'round' 	=> $round,
			'gameId' 	=> $gameId,
			'roundId' 	=> $roundId,
			'fixtures'  => $fixtures,
		));
	}

	public function saveRoundFixtures() {
		$results = Input::all();

		unset($results['_token']); // remove the token for now
		
		$gameId = $results['game_id'];
		unset($results['game_id']);

		$roundId = $results['round_id'];
		unset($results['round_id']);

		$fixtures = array();

		foreach($results as $key => $result) {
			$pieces = explode("-", $key);
			$fixtures[$pieces[1]][$pieces[2]] = $result;		
		}

		foreach($fixtures as $fixtureId => $data) {
			$fixture = Fixture::find($fixtureId);
			$fixture->home_team_score = $data['home_team_id'];
			$fixture->away_team_score = $data['away_team_id'];
			$fixture->save();
		}

		return Redirect::to('/admin/dashboard?gameId='.$gameId.'&roundId='.$roundId)->with('message', 'Round Fixture Results Saved!');

	}

	public function createGame() {
		return View::make('admin/create_game');
	}

	public function doCreateGame() {
		$gameName = Input::get('game_name');
		$startingRound = Input::get('starting_round');

		Artisan::call('lts:makegame', array('name' => $gameName, 'starting_round' => $startingRound));

		return Redirect::to('/admin/dashboard')->with('message', 'Game successfully created!');
	}

	public function completeRound() {
		$gameId = Input::get('game_id');
		$roundId = Input::get('round_id');

		Artisan::call('lts:completeround', array('game_id' => $gameId, 'round_id' => $roundId));

		return Redirect::to('/admin/dashboard?gameId='.$gameId.'&roundId='.$roundId)->with('message', 'Game round completed!');
	}

	public function togglePredictions() {
		$gameId = Input::get('game_id');
		$roundId = Input::get('round_id');
		$canPredict = Input::get('can_predict');

		$round = Round::find($roundId);
		$round->can_predict = $canPredict;
		$round->save();

		if($canPredict) {
			$message = "Round predictions opened!";
		} else {
			$message = "Round predictions closed!";
		}
		
		return Redirect::to('/admin/dashboard?gameId='.$gameId.'&roundId='.$roundId)->with('message', $message);
	}

	public function getRoundsForGame($gameId) {
		if($gameId) {
			$rounds = Round::where('game_id', '=', $gameId)->get();
			return $rounds;
		}
	}

}
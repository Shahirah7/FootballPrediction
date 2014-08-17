<?php

class GameController extends BaseController {

	public function joinGame() {

		$user = Auth::user();

		if($user->game_id == 0 AND !is_null($user->game_id)) {
			return Redirect::to('account')->with('errors', 'You cannot join this game as you are already part of a game!'); 
		}

		$validator = Validator::make(array('game_id' => Input::get('game_id')), array('game_id' => 'required|integer|exists:games,id'));

		if($validator->passes()) {
				$game = Game::find(Input::get('game_id'));
			$currentRound = $game->getCurrentRound();

			$user->game_id = Input::get('game_id');
			$user->final_round_id = $currentRound->id;
			$user->save();

			return Redirect::to('account')->with('message', 'You have joined the game!'); 
		} else {
			return Redirect::to('account')->with('errors', 'You cannot join this game!'); 
		}
		

	}

	public function makePrediction() {

		$user = Auth::user();

		$game = Game::find($user->game_id);
		$currentRound = $game->getCurrentRound();

		if($user->hasMadePrediction($currentRound->id)) {
			return Redirect::to('account')->with('errors', 'You have already made a prediction for this round!'); 
		}

		$validator = Validator::make(array('team_id' => Input::get('team_id')), array('team_id' => 'required|integer|exists:teams,id'));

		if(!$validator->passes()) {
			return Redirect::to('account')->with('errors', 'You cannot pick the team you have chosen!'); 
		}

		$teamsTheyCanPickResult = $user->getAvailableTeamsForRound($game->id);

		if(!count($teamsTheyCanPickResult)) {
			return Redirect::to('account')->with('errors', 'You cannot pick the team you have chosen!'); 
		}

		$availableTeams = array();
		foreach($teamsTheyCanPickResult as $team) {
			$availableTeams[] = $team->id;
		}

		if(!in_array(Input::get('team_id'), $availableTeams)) {
			return Redirect::to('account')->with('errors', 'You cannot pick the team you have chosen!'); 
		}

		$userPick = new UserPick();
		$userPick->user_id = $user->id;
		$userPick->game_id = $game->id;
		$userPick->round_id = $currentRound->id;
		$userPick->team_id  = Input::get('team_id');
		$userPick->save();

		return Redirect::to('account')->with('message', 'Your prediction was saved!'); 
		

	}

	public function viewGame($gameId) {

		$games = Game::all();
		
		if($gameId) {
			$currentGame 		= Game::find($gameId);
			$currentGamePlayers = $currentGame->users()->getResults();
		}

		return View::make('home/viewgame', array(
			'game'				 => $currentGame,
			'currentGamePlayers' => $currentGamePlayers
		));
	}
	
}

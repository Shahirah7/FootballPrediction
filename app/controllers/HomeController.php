<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHomepage() {
		return View::make('home/index');
	}

	public function showAboutPage() {
		return View::make('home/about');
	}

	public function myAccount() {

		$user = Auth::user();
		$games = Game::all();

		$currentGame = $currentGamePlayers = $currentRound = 
			$upcomingFixtures = $availableTeams = null;

		if($user->game_id) {
			$currentGame 		= $user->game()->first();
			$currentGamePlayers = $currentGame->users()->getResults();
			$currentRound 		= $currentGame->getCurrentRound();
			$upcomingFixtures 	= Fixture::where('round_id', '=', $currentRound->id)->get();
			$availableTeams     = $user->getAvailableTeamsForRound($currentGame->id);
		}

		return View::make('home/account', array(
			'games' 			 => $games,
			'currentGame'		 => $currentGame,
			'currentGamePlayers' => $currentGamePlayers,
			'currentRound'		 => $currentRound,
			'upcomingFixtures'	 => $upcomingFixtures,
			'user'				 => $user,
			'availableTeams'	 => $availableTeams
		));
	}

}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	 public static $rules = array(
		'name' 					=> 'required|min:2',
		'email' 				=> 'required|email|unique:users',
		'username'				=> 'required|alpha_dash|min:2|unique:users',
		'password' 				=> 'required|alpha_num|between:6,12|confirmed',
		'password_confirmation' => 'required|alpha_num|between:6,12'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function roundResults()
    {
        return $this->hasMany('RoundResult');
    }

    public function userPicks()
    {
        return $this->hasMany('UserPick');
    }

    public function game()
    {
        return $this->belongsTo('Game');
    }

    public function getAvailableGames() {
        $gamesAlreadyPicked = DB::table('user_picks')
            ->where('user_id', '=', $this->id)
            ->groupBy('game_id')
            ->lists('game_id');

        if(count($gamesAlreadyPicked)) {
            return DB::table('games')->whereNotIn('id', $gamesAlreadyPicked)->get();
        } else {
            return Game::all();
        }

    }

    public function getNumberOfPredictionsMade() {
    	return DB::table('user_picks')->where('user_id', '=', $this->id)->count();
    }

    public function getAvailableTeamsForRound($gameId) {
    	$teamsAlreadyPicked = DB::table('user_picks')
    		->where('user_id', '=', $this->id)
    		->where('game_id', '=', $gameId)
    		->lists('team_id');

    	if(count($teamsAlreadyPicked)) {
    		return DB::table('teams')->whereNotIn('id', $teamsAlreadyPicked)->get();
    	} else {
    		return Team::all();
    	}

    }

    public function hasMadePrediction($roundId) {
        $result = DB::table('user_picks')
            ->where('user_id', '=', $this->id)
            ->where('round_id', '=', $roundId)
            ->count();

        return $result;

    }
}

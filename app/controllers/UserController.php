<?php

class UserController extends BaseController {

	public function login() {
		return View::make('user/login');
	}

	public function doLogin() {

		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		return Redirect::to('/account');
		} else {
			return Redirect::to('login')->with('errors', 'Login details were incorrect!')->withInput();
		}
	}

	public function logout() {
		if (Auth::check()) {
		  	Auth::logout();
		  	return Redirect::to('/')->with('message', 'You are now logged out!');
		} else {
			return Redirect::to('/');
		}
	}

	public function register() {
		return View::make('user/register');
	}

	public function doRegister() {
		
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {

		    $user = new User();
			$user->name = Input::get('name');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->game_id = null;
			$user->final_round_id = null;
			$user->save();

			return Redirect::to('login')->with('message', 'You can now login!'); 
		
		} else {

			return Redirect::to('register')->with('errors', $validator->messages())->withInput(); 
		}

	}
}

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
			return Redirect::to('login')->with('message', 'Login details were incorrect!');
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

	}
}

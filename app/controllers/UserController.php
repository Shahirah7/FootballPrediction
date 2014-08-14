<?php

class UserController extends BaseController {

	public function login() {
		return View::make('user/login');
	}

	public function doLogin() {

	}

	public function logout() {

	}

	public function register() {
		return View::make('user/register');
	}

	public function doRegister() {

	}
}

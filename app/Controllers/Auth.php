<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function login()
	{
		$data = [
			'title' => 'Login - InstaApp'
		];
		return view('auth/login', $data);
	}
	public function register()
	{
		$data = [
			'title' => 'Register - InstaApp'
		];
		return view('auth/register', $data);
	}
}

<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->usersModel = new UsersModel();
	}

	public function login()
	{
		$data = [
			'title' => 'Login - InstaApp'
		];
		return view('/auth/login', $data);
	}

	public function register()
	{
		$data = [
			'title' => 'Register - InstaApp',
			'validation' => \config\services::validation()
		];
		return view('/auth/register', $data);
	}

	public function authLogin()
	{
		$request = service('request');

		$username = $request->getVar('username');
		$password = $request->getVar('password');

		$row = $this->usersModel->getLogin($username);

		if ($row == NULL) {
			return redirect()->to('/auth/login')->withInput()->with('errlog', 'The username you entered doesn\'t belong to an account');
		}
		if (password_verify($password, $row->password)) {
			$data = [
				'login' => TRUE,
				'username' => $row->username,
				'fullname' => $row->fullname,
				'role' => $row->role
			];

			session()->set($data);
			session()->setFlashdata('message', 'welcome');
			return redirect()->to('/');
		}
		return redirect()->to('/auth/login')->withInput()->with('errlog', 'Your password was incorrect');
	}

	public function saveRegister()
	{
		$request = service('request');

		$rules = [
			'fullname' => [
				'rules' => 'required|min_length[5]|max_length[20]',
				'errors' => [
					'required' => 'Please input a name',
					'min_length' => 'The name should not be less than 5 characters',
					'max_length' => 'The name should not be more than 10 characters',
				]
			],
			'email' => [
				'rules' => 'required|valid_email|max_length[50]|is_unique[users.email]',
				'errors' => [
					'required' => 'Please input an email',
					'max_length' => 'The name should not be more than 50 characters',
					'valid_email' => 'The email is invalid',
					'is_unique' => 'Email is already used'
				]
			],
			'username' => [
				'rules' => 'required|min_length[5]|max_length[16]|is_unique[users.username]',
				'errors' => [
					'required' => 'Please input a name',
					'min_length' => 'The username should not be less than 5 characters',
					'max_length' => 'The username should not be more than 16 characters',
					'is_unique' => 'The username is already used',
				]
			],
			'password' => [
				'rules' => 'required|min_length[6]',
				'errors' => [
					'required' => 'Please input a password',
					'min_length' => 'The password should not be less than 6 characters'
				]
			]
		];

		if ($this->validate($rules)) {
			$this->usersModel->insert([
				'fullname' => $request->getVar('fullname'),
				'username' => $request->getVar('username'),
				'email' => $request->getVar('email'),
				'password' => password_hash($request->getVar('password'), PASSWORD_DEFAULT),
				'role' => 2
			]);

			session()->setFlashdata('msg', 'Account has been registered');

			return redirect()->to('/auth/login');
		} else {
			return redirect()->to('/auth/register')->withInput();
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/login');
	}
}

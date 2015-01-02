<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller {

	// GET /auth/register
	public function register()
	{
		return view('auth.register');
	}


	// POST /auth/register
	public function doRegister(RegisterRequest $request)
	{
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = \Hash::make($request->password);
		$user->save();

		return redirect('panel');
	}


	// GET /auth/login
	public function login()
	{
		return view('auth.login');
	}


	// POST /auth/login
	public function doLogin(LoginRequest $request)
	{
		if(\Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
			return \Redirect::intended('panel');
		}

		return redirect('auth/login')
			->withErrors(array('Wrong email address or password.'));
	}


	// POST /auth/logout
	public function logout()
	{
		\Auth::logout();

		return redirect('panel');
	}
}

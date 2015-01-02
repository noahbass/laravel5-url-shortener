<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class UserTest extends TestCase {

	/**
	 * Create a new user.
	 *
	 * @return void
	 */
	public function testCreate()
	{
		Factory::create('App\User');
	}


	/*public function testLogin()
	{
		Auth::loginUsingId(1);
	}*/

}

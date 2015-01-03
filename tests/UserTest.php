<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

use App\User;
use App\Urls;

class UserTest extends TestCase {

	public function setUp()
	{
		parent::setUp();

		$this->prepareUser();
	}

	/**
	 * Prepare by creating a user and authing it.
	 *
	 * @return void
	 */
	public function prepareUser()
	{
		// create a user and save it to $user
		$user = Factory::create('App\User');

		// auth as the user
		$this->be($user);
	}

	/**
	 * Test the user.
	 *
	 * @return void
	 */
	public function testUser()
	{
		// get the user
		$user = Auth::user();

		// make sure user details are accessible
		$this->assertNotEmpty($user->name);
		$this->assertNotEmpty($user->email);
		$this->assertNotEmpty($user->password);
	}

	/**
	 * Test if user has access to panel.
	 *
	 * @return void
	 */
	public function testPanel()
	{
		// GET: /panel
		$response = $this->call('GET', '/panel');

		// Response code should 200 b/c authed
		$this->assertEquals(200, $response->getStatusCode());


		// GET: /panel/create
		$response = $this->call('GET', '/panel/create');

		// Response code should 200 b/c authed
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Test if user has access to panel/create.
	 *
	 * @return void
	 */
	public function testPanelCreate()
	{
		// GET: /panel/create
		$response = $this->call('GET', '/panel/create');

		// Response code should 200 b/c authed
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Test if user has access to panel/{id}/edit.
	 *
	 * @return void
	 */
	public function testPanelEdit()
	{
		$entries = Urls::all();

		foreach($entries as $entry) {
			// GET: /panel/{id}/edit
			$response = $this->call('GET', '/panel/' . $entry->id . '/edit');

			// Response code should 200 b/c authed
			$this->assertEquals(200, $response->getStatusCode());
		}
	}

}

<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class PanelTest extends TestCase {

	/**
	 * Hit the panel.
	 *
	 * @return void
	 */
	public function testHitPanel()
	{
		// GET: /panel
		$response = $this->call('GET', '/panel');

		// Response code should 302 b/c redirect to /auth/login
		$this->assertEquals(302, $response->getStatusCode());

		// Response header location should be /auth/login
		$this->assertRedirectedTo('auth/login');
	}

}

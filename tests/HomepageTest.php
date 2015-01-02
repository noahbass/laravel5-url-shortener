<?php

class HomepageTest extends TestCase {

	/**
	 * Hitting the homepage should result in a 302 redirect
	 *
	 * @return void
	 */
	public function testIndex()
	{
		// GET: /
		$response = $this->call('GET', '/');

		// response should be a 302 code
		$this->assertEquals(302, $response->getStatusCode());
	}

}

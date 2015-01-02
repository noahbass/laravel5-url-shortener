<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class UrlTest extends TestCase {

	/**
	 * Creating a new url.
	 *
	 * @return void
	 */
	public function testIndex()
	{
		// create some entries for redirects
		$entries = Factory::times(100)->create('App\Urls');

		// test each redirect
		foreach($entries as $entry) {
			// GET: /{slug}
			$response = $this->call('GET', '/' . $entry->slug);

			// Reponse code should be 302 because its a redirect
			$this->assertEquals(302, $response->getStatusCode());

			// Reponse header location should be the same as the dist url
			$this->assertEquals($entry->dist, $response->headers->get('location'));
		}
	}

}

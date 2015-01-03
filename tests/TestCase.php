<?php

use Laracasts\TestDummy\Factory;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	public function setUp()
	{
		parent::setUp();

		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	public function prepareForTests()
	{
		// migrate tables
		Artisan::call('migrate');

		// create some resources
		Factory::times(100)->create('App\Urls');
	}

}

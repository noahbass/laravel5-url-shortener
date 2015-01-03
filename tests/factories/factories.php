<?php

// create a user
$factory('App\User', [
	'id'       => 1,
	'name'     => $faker->name,
	'email'    => $faker->safeEmail,
	'password' => $faker->password
]);


// create url redirect
$factory('App\Urls', [
	'user_id' => 1,
	'slug'    => $faker->slug,
	'dist'    => $faker->url,
	'title'   => $faker->sentence,
	'clicks'  => 0
]);

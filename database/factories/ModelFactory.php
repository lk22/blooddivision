<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
* define a new factory for the user seeding 
*/

$factory->define(Blooddivision\User::class, function(faker\Generator $faker) {
    return [
        'name' => str_slug($faker->name, '-'),
        'email' => $faker->email,
        'avatar' => $faker->randomElement([
	        '/images/avatars/005-avatar-large-190x190-93034cb05164464887fa7f3e6fc936d8.jpg',
	        '/images/avatars/008-avatar-large-190x190-88284542f8f44f58b7be6281c1347d25.jpg',
	        '/images/avatars/1039002_0_2039002_3001_24_1.png',
	        '/images/avatars/avatar-302-0e1742296505457fae4db552f5af41c3.png'
        ]),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
* define a new factory for the event seeding
*/
$factory->define(Blooddivision\Event::class, function(faker\Generator $faker){
	return [
		'event_name' => $faker->paragraph,
		'event_game' => $faker->randomElement([
			'Destiny',
			'Halo 5',
			'Grand Theft Auto V',
			'World Of Warcraft',
			'Star Wars The old Republic',
			'Star Wars Battlefront',
		]),
		'event_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptates, totam ducimus quas quam molestiae dolorum numquam deleniti, similique eaque, est molestias! Officiis molestias, amet voluptatibus asperiores iste, dignissimos rem.',
		'event_datetime' => $faker->date('Y-m-d', \Carbon\Carbon::now()), 
		'user_id' => rand(0, 20),
	];
});

/**
 * define seeder factory for games
 */
$factory->define(Blooddivision\Game::class, function(faker\Generator $faker){
	return [
		'game' => $faker->randomElement([
			'Star Wars Battlefront',
			'World Of Warcraft',
			'Grand Theft Auto V',
			'Halo 5 Guardians',
			'Star Wars The Old Republic',
			'Destiny'
		]),
		'game_cover' => $faker->randomElement([
			'/images/covers/battleforont.jpeg',
			'/images/covers/Destiny.jpg',
			'/images/covers/gta5.jpg',
			'/images/covers/halo5cover.jpg',
			'/images/covers/swtor_logo.png',
			'/images/covers/wowlogo.png'
		]),
		'user_id' => rand(0, 20)
	];
});

/**
 * definer factory for roles seeding
 */
$factory->define(Blooddivision\Role::class, function(faker\Generator $faker){
	return [
		'role' => $faker->randomElement([
			'user',
			'admin',
			'superAdmin'
		])
	];
});

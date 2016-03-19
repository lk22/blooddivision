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
	  		'005-avatar-large-190x190-93034cb05164464887fa7f3e6fc936d8.jpg',
	  		'008-avatar-large-190x190-88284542f8f44f58b7be6281c1347d25.jpg',
	  		'1039002_0_2039002_3001_24_1.png',
	  		'ninja-background-128.png'
        ]),
        'cover' => $faker->randomElement([
        	'halopic2.jpg',
        	'destiny1.jpg',
        	'swtor1.jpg',
        	'halo4screenshot2.jpg'
        ]),
        'profile_desc' => $faker->paragraph,
        'password' => bcrypt('secret'),
        'verified' => true,
        'remember_token' => str_random(10),
    ];
});

/**
* define a new factory for the event seeding
*/
$factory->define(Blooddivision\Event::class, function(faker\Generator $faker){
	return [
		'name' => "leokk2200",
		'game' => $faker->randomElement([
			'Destiny',
			'Halo 5',
			'Grand Theft Auto V',
			'World Of Warcraft',
			'Star Wars The old Republic',
			'Star Wars Battlefront',
		]),
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptates, totam ducimus quas quam molestiae dolorum numquam deleniti, similique eaque, est molestias! Officiis molestias, amet voluptatibus asperiores iste, dignissimos rem.',
		'completed' => $faker->randomElement([true, false]),
		'datetime' => $faker->date('Y-m-d', \Carbon\Carbon::now()), 
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
			'battlefront.jpeg',
			'Destiny.jpg',
			'gta5.jpg',
			'halo5cover.jpg',
			'swtor_logo.png',
			'wowlogo.png'
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

$factory->define(Blooddivision\Contact::class, function(faker\Generator $faker){
	return [
		'name' => $faker->name,
		'email' => $faker->email,
		'message' => $faker->paragraph
	];
});

$factory->define(Blooddivision\Rank::class, function(faker\Generator $faker){
	return [
		'rank' => $faker->randomElement([
			'Recruit',
			'Sergeant',
			'Commander',
			'Major',
			'General',
			'Senior Sergeant',
			'Over Sergeant'
		]),
		'user_id' => rand(0, 20)
	];
});

$factory->define(Blooddivision\Article::class, function (faker\Generator $faker) {
	return [
		'title' => $faker->name,
		'body' => $faker->paragraph
	];
});

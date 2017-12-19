<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
    }
}

class ArticlesTableSeeder extends Seeder
{
	public function run()
	{
		Article::truncate();
		$faker = \Faker\Factory::create();

		for($i = 0; $i < 50; $i++) {
			Article::create([
				'title' => $faker->sentence,
				'body' => $faker->paragraph,
				]);
		}
	}
}

class UsersTableSeeder extends Seeder 
{
	public function run()
	{
		User::truncate();

		$faker = \Faker\Factory::create();
		$password = Hash::make('toptal');
		User::create([
			'name' => 'admin',
			'email' => 'admin@test.com',
			'password' => $password,
			'password_confirmation' => $password,
			]);

		 for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,                
				'password_confirmation' => $password,
            ]);
        }
	}
}
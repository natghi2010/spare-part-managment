<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //creates fake user
        DB::table('users')->insert([
            'name' =>'Demo',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'Admin',
        ]);

        //creates fake 10 customers
      
            $faker = Faker::create();
        	foreach (range(1,100) as $index) {
	        DB::table('customers')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'phone' => rand(10000,40000),
	            'tin_number' => $faker->numberBetween(10000,50000000)
	        ]);
	
        }

        // $this->call(UsersTableSeeder::class);
    }
}

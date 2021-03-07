<?php

use App\Part;
use App\PartType;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Vehicle;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (!User::where('email', 'demo@gmail.com')->get()->count()) {
            //creates fake user
            DB::table('users')->insert([
                'name' => 'Demo',
                'email' => 'demo@gmail.com',
                'password' => Hash::make('password'),
                'type' => 'Admin',
            ]);
        }
        if (!User::where('email', 'natghi2010@gmail.com')->get()->count()) {
            //creates fake user
            DB::table('users')->insert([
                'name' => 'Natnael',
                'email' => 'natghi2010@gmail.com',
                'password' => Hash::make('password'),
                'type' => 'Admin',
            ]);
        }


        //create vehicle
        Vehicle::create([
            "model" => "Vitz",
            "year" => 2004
        ]);

        PartType::create([
            'name'=>'Engine'
        ]);

        Part::create([
            "name"=>"Gasket",
            "part_no"=>23842,
            "qty"=>10,
            "vehicle_id"=>Vehicle::first()->id,
            "part_type_id"=>PartType::first()->id,
        ]);





        //creates fake 10 customers

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => '+251911' . $faker->numberBetween(100000, 900000),
                'address' => 'Bole',
                'tin_number' => $faker->numberBetween(1000000000, 9000000000)
            ]);

            $faker = Faker::create();
            foreach (range(1, 10) as $index) {
                DB::table('suppliers')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => '+251911' . $faker->numberBetween(100000, 900000),
                    'country_of_origin' => 'China',
                    'tin_number' => $faker->numberBetween(1000000000, 9000000000)
                ]);
            }
        }

        // $this->call(UsersTableSeeder::class);
    }
}

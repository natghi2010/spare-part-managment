<?php

use App\Part;
use App\PartType;
use App\Suppliers;
use App\Customers;
use App\Transaction;
use App\ActivityLog;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Vehicle;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

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


        for ($i = 0; $i < 25; $i++) {
            //create vehicle
            Vehicle::create([
                "model" => $faker->firstNameFemale,
                "year" => rand(2000, 2021)
            ]);

            ActivityLog::create([
                "action" => "Sold gasket",
                "user_id" => User::inRandomOrder()->first()->id,
            ]);

            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => '+251911' . $faker->numberBetween(100000, 900000),
                'address' => 'Bole',
                'tin_number' => $faker->numberBetween(1000000000, 9000000000),
                'status' => 'Active'
            ]);


            DB::table('suppliers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => '+251911' . $faker->numberBetween(100000, 900000),
                'country_of_origin' => 'China',
                'tin_number' => $faker->numberBetween(1000000000, 9000000000),
                'status' => 'Active'
            ]);
        }

        PartType::create([
            'name' => 'Engine'
        ]);
        PartType::create([
            'name' => 'Body'
        ]);

        $part_types = PartType::all();

        foreach ($part_types as $part_type) {
            Part::create([
                "name" => "Gasket",
                "part_no" => rand(1000, 10000),
                "qty" => rand(1, 20),
                "vehicle_id" => Vehicle::inRandomOrder()->first()->id,
                "part_type_id" => $part_type->id,
            ]);
        }


        for ($i = 0; $i < 10; $i++) {

            $part_type_id = PartType::inRandomOrder()->first()->id;

            $part_id = Part::where('part_type_id', $part_type_id)->inRandomOrder()->first()->id;

            Transaction::create([
                "transaction_id" => "TRBY-100" . $i,
                "type" => "BUY",
                //"customer_id"=>null,
                "supplier_id" => Suppliers::inRandomOrder()->first()->id,
                "part_id" => $part_id,
                "part_type_id" => $part_type_id,
                "vehicle_id" => Vehicle::first()->id,
                "price" => rand(1, 9000),
                "qty" => rand(1, 20),
                "new_balance" => rand(1, 9000),
                "date" => Carbon::now(),
                "user_id" => User::inRandomOrder()->first()->id,

            ]);
            Transaction::create([
                "transaction_id" => "TRSL-100" . $i,
                "type" => "SELL",
                //"customer_id"=>null,
                "customer_id" => Customers::inRandomOrder()->first()->id,
                "part_id" => $part_id,
                "part_type_id" => $part_type_id,
                "vehicle_id" => Vehicle::first()->id,
                "price" => rand(1, 9000),
                "qty" => rand(1, 20),
                "new_balance" => rand(1, 9000),
                "date" => Carbon::now(),
                "user_id" => User::inRandomOrder()->first()->id,

            ]);
        }






        //creates fake 10 customers


        // $faker = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     DB::table('transactions')->insert([
        //         'part_no' => $faker->part_no,
        //         'name' => $faker->name,
        //         'vehicle' => $faker->$router->model('vehicle', 'App\Models\vehicle'),
        //         'name' => $faker->part_type,
        //         'qty' => $faker->numberBetween(1, 900)
        //     ]);





        // $this->call(UsersTableSeeder::class);
    }
}

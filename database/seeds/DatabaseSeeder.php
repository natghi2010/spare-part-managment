<?php

use App\Part;
use App\PartType;
use App\Suppliers;
use App\Customers;
use App\Transaction;
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
        Vehicle::create([
            "model" => "isuzu",
            "year" => 2000
        ]);

        PartType::create([
            'name'=>'Engine'
        ]);
        PartType::create([
            'name'=>'Body'
        ]);

        Part::create([
            "name"=>"Gasket",
            "part_no"=>23842,
            "qty"=>10,
            "vehicle_id"=>Vehicle::first()->id,
            "part_type_id"=>PartType::first()->id,
        ]);
        $faker = Faker::create();
        Suppliers::create([
            "name"=>"selam",
            "country_of_origin"=>"canada",
            'tin_number' => $faker->numberBetween(1000000000, 9000000000),
            'phone' => '+251911' . $faker->numberBetween(100000, 900000),
            'email' => $faker->email,
            "status"=>"active",


        ]);

        $faker = Faker::create();
        Customers::create([
            "name"=>"aman",
            'email' => $faker->email,
            'phone' => '+251911' . $faker->numberBetween(100000, 900000),
            'tin_number' => $faker->numberBetween(1000000000, 9000000000),
            "address"=>"Addis Ababa",
            "contact_person"=>"abebe",
            "status"=>"active",


        ]);


        Transaction::create([
            "transaction_id"=>"TRBY-1002",
            "type"=>"buy",
            //"customer_id"=>null,
            "supplier_id"=>Suppliers::first()->id,
            "part_id"=>Part::first()->id,
            "part_type_id"=>PartType::first()->id,
            "vehicle_id"=>Vehicle::first()->id,
            "price"=>23,
            "qty"=>10,
            "new_balance"=>4,
            "date"=>"20-20-2012",
            "user_id"=>User::first()->id,

        ]);
        Transaction::create([
            "transaction_id"=>"TRBY-1003",
            "type"=>"sell",
            //"customer_id"=>null,
            "customer_id"=>Customers::first()->id,
            "part_id"=>Part::first()->id,
            "part_type_id"=>PartType::first()->id,
            "vehicle_id"=>Vehicle::first()->id,
            "price"=>50,
            "qty"=>100,
            "new_balance"=>4,
            "date"=>"20-20-2012",
            "user_id"=>User::first()->id,

        ]);
        Transaction::create([
            "transaction_id"=>"TRBY-1003",
            "type"=>"sell",
            //"customer_id"=>null,
            "customer_id"=>Customers::first()->id,
            "part_id"=>Part::first()->id,
            "part_type_id"=>PartType::first()->id,
            "vehicle_id"=>Vehicle::first()->id,
            "price"=>50,
            "qty"=>100,
            "new_balance"=>4,
            "date"=>"20-20-2012",
            "user_id"=>User::first()->id,

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


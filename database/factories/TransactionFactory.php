<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use App\Product;
use App\Suppliers;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
                "transaction_id"=>"RTRN".mt_rand(1000000,9999999),
                "type"=>"recieve",
                "supplier_id"=>Suppliers::inRandomOrder()->first()->id,
                "product_id"=>Product::inRandomOrder()->first()->id,
                "qty"=>rand(1,5),
                "date"=>Carbon::now(),
                "user_id"=>User::inRandomOrder()->first()->id
            ];
});

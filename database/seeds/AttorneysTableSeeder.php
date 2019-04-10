<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Attorney;
use App\AttorneyClient;

class AttorneysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Attorney::truncate();
        AttorneyClient::truncate();

        foreach(range(1, 20) as $i){
            $products = collect();

            foreach(range(1, mt_rand(2, 10)) as $i){
                $products->push(new AttorneyClient([
                    'first_name'   => $faker->name,
                    'middle_name'  => $faker->name,
                    'last_name'    => $faker->name,
                    'dob'          => $faker->date()
                ]));
            }

            $attorney = Attorney::create([
                'attorney_number'  => $faker->numberBetween(10000, 40000),
                'first_name'       => $faker->name,
                'middle_name'      => $faker->name,
                'last_name'        => $faker->name,
                'dob'              => $faker->date()
            ]);

            $attorney->products()->saveMany($products);
        }
    }
}

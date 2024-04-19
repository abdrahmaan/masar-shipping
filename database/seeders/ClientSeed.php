<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ClientFactory;
use Database\Factories\ClientOneFactory;
use App\Models\Client;
use Faker\Factory as Faker;


class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(100)->create();

        
        for ($i=0; $i <= 100; $i++) { 

            $faker = Faker::create();

            Client::create([
                "client_type"  => "commercial",
                "tradeName"  => $faker->company(),
                "fullName"  => $faker->name(),
                "gender"  => "Male",
                "taxNumber"  => $faker->randomNumber(7),
                "registerNumber"  => $faker->randomNumber(7),
                "phone"  => $faker->phoneNumber(),
                "phoneTwo"  => $faker->phoneNumber(),
                "email"  => $faker->email(),
                "address"  => $faker->streetAddress(),
                "district"  => $faker->randomElement(["الخبر","المدينة"]),
                "city"  => $faker->randomElement(["الرياض","جدة"]),
                "postalCode"  => $faker->randomNumber(6),
            ]);
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ClientFactory;
use Database\Factories\ClientOneFactory;
use App\Models\Client;
use App\Models\Employee;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        Employee::create([
            "name" => "Abdulrahman Hamdy",
            "username" => "bedoohamdy",
            "password" => "112233",
            "phone" => "01110645479",
            "phoneTwo" => "01110645479",
            "address" => "71 Kamel Atyia Morsi",
            "district" => "Imbaba",
            "city" => "Giza",
            "role" => "Admin",
            "salary" => "3000",
            "dateOfJoin" => "2024-05-11",
        ]);

        BankAccount::updateOrCreate(["default"=>1],
        [
            "default"  => 1,
            "companyName"  => "أطلس الذهبية للمصاعد",
            "bankName"  => "بنك الأنماء",
            "accNumber"  => "68204530730000",
            "iban" => "SA1305000068204530730000",
        ]
        );
    }
}

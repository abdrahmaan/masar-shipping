<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ClientFactory;
use Database\Factories\ClientOneFactory;
use App\Models\Client;
use App\Models\Delivery;
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
        Delivery::factory()->count(500)->create();

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

    }
}

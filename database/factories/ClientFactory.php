<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commercial>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     // protected $model = Client::class;

     public function definition()
     {

            return [
                "client_type"  => "individual",
                "fullName"  => $this->faker->name(),
                "gender"  => "Male",
                "phone"  => $this->faker->phoneNumber(),
                "phoneTwo"  => $this->faker->phoneNumber(),
                "email"  => $this->faker->email(),
                "address"  => $this->faker->streetAddress(),
                "district"  => $this->faker->randomElement(["الخبر","المدينة"]),
                "city"  => $this->faker->randomElement(["الرياض","جدة"]),
                "postalCode"  => $this->faker->randomNumber(7),
                "national_id"  => $this->faker->randomNumber(7),
                "dateOfBirth" => $this->faker->date(),
            ];
 
        //  return [
        //      "client_type"  => "commercial",
        //      "tradeName"  => $this->faker->company(),
        //      "fullName"  => $this->faker->name(),
        //      "gender"  => "Male",
        //      "taxNumber"  => $this->faker->randomNumber(7),
        //      "registerNumber"  => $this->faker->randomNumber(7),
        //      "phone"  => $this->faker->phoneNumber(),
        //      "phoneTwo"  => $this->faker->phoneNumber(),
        //      "address"  => $this->faker->streetAddress(),
        //      "district"  => $this->faker->randomElement(["الخبر","المدينة"]),
        //      "city"  => $this->faker->randomElement(["الرياض","جدة"]),
        //      "postalCode"  => $this->faker->randomNumber(6),
        //  ];
     }
}

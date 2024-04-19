<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "fullName"  => fake()->name(),
            "gender"  => "Male",
            "phone"  => fake()->phoneNumber(),
            "phoneTwo"  => fake()->phoneNumber(),
            "email"  => fake()->email(),
            "address"  => fake()->streetAddress(),
            "district"  => fake()->randomElement(["الوراق","إمبابة"]),
            "city"  => fake()->randomElement(["الجيزة","القاهرة"]),
            "commission"  => fake()->numberBetween(10,25),
            "national_id"  => fake()->randomNumber(9),
            "dateOfBirth" => fake()->date(),
        ];

    }
}

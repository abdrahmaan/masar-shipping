<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommercialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "client_type"  => "individual",
            "fullName"  => $this->faker->name(),
            "gender"  => "Male",
            "phone"  => $this->faker->phoneNumber(),
            "phoneTwo"  => $this->faker->phoneNumber(),
            "address"  => $this->faker->streetAddress(),
            "district"  => $this->faker->randomElement(["الخبر","المدينة"]),
            "city"  => $this->faker->randomElement(["الرياض","جدة"]),
            "postalCode"  => $this->faker->randomNumber(7),
            "national_id"  => $this->faker->randomNumber(7),
            "dateOfBirth" => $this->faker->date(),
        ];
    }
}

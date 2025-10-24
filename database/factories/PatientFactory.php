<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patientcode' => 'PT-' . now()->year . '-' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'middlename' => fake()->lastName(),
            'sex' => fake()->randomElement(['male', 'female']),
            'birthdate' => fake()->date('Y-m-d', 'now'),
            'contactnumber' => fake()->numerify('09#########'),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'bloodtype' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'allergies' => fake()->randomElement(['None', 'Pollen', 'Seafood', 'Peanuts', 'Dust', 'Latex']),
            'emergencycontactname' => fake()->word(),
            'emergencycontactnumber' => fake()->numerify('09#########'),
        ];
    }
}

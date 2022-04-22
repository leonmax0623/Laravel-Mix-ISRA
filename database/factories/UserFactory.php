<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory {
    protected $model = User::class;

    public function definition() {
        return [
            'first_name' => $this->faker->firstNameMale(),
            'last_name' => $this->faker->lastName(),
            'company_name' => $this->faker->company(),
            'company_number' => $this->faker->e164PhoneNumber(),
            'passport_number' => rand(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->e164PhoneNumber(),
            'country_id' => collect(config('enum.country'))->random()['id'],
            'address_index' => $this->faker->boolean(80) ? $this->faker->postcode() : NULL,
            'address_city' => $this->faker->boolean(80) ? $this->faker->city() : NULL,
            'address_street' => $this->faker->boolean(80) ? $this->faker->streetName() : NULL,
            'address_house' => $this->faker->boolean(80) ? $this->faker->buildingNumber() : NULL,
            'entrance_code' => $this->faker->boolean(30) ? $this->faker->randomNumber(5) : NULL,
            'entrance_floor' => $this->faker->boolean(80) ? rand(1, 30) : NULL,
            'entrance_apartment' => $this->faker->boolean(80) ? rand(1, 200) : NULL,
            'rivhit' => rand(),
            'remember_token' => Str::random(10),
            'entrance_elevator' => $this->faker->boolean(),
            'created_at' => \Carbon\Carbon::now()->addDays(rand(-30, 30))->addHours(rand(-24, 24))->addMinutes(rand(-60, 60))->addSeconds(rand(-60, 60))
        ];
    }

    public function unverified() {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

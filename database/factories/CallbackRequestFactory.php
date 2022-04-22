<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CallbackRequestFactory extends Factory {
    protected $model = \App\Models\CallbackRequest::class;

    public function definition() {
        return [
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'name' => $this->faker->name(),
            'text' => $this->faker->text(rand(30, 100)),
            'status' => collect(config('enum.callback_request_status'))->random()['id'],
            'created_at' => \Carbon\Carbon::now()->addDays(rand(-5, 0))->addHours(rand(-24, 0))->addMinutes(rand(-60, 0))->addSeconds(rand(-60, 0))
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $date_delivery_datetime = \Carbon\Carbon::now()->addDays(rand(-5, 5));

        return [
            'order_status_id' => collect(config('enum.order_status'))->random()['id'],
            'payment_status_id' => collect(config('enum.payment_status'))->random()['id'],
            'payment_type_id' => collect(config('enum.payment_type'))->random()['id'],
            'branch_id' => \App\Models\Branch::all()->collect()->random()->id,
            'delivery_datetime' => $date_delivery_datetime,
            'pickup_datetime' => $date_delivery_datetime->addHours(rand(1, 24)),
            'expiry_date' => $date_delivery_datetime->addHours(rand(1, 24))->addDays(rand(30, 180)),
            'phone_1' => $this->faker->phoneNumber(),
            'phone_2' => $this->faker->phoneNumber(),
            'address_index' => $this->faker->postcode(),
            'address_city' => $this->faker->city(),
            'address_street' => $this->faker->streetName(),
            'address_house' => $this->faker->buildingNumber(),
            'entrance_code' => rand(1000, 9999),
            'entrance_floor' => rand(0, 21),
            'entrance_apartment' => rand(1, 250),
            'entrance_elevator' => rand(0, 1),
            'comment' => $this->faker->text(rand(100, 200)),
            'rivhit' => rand(),
            'location' => $this->faker->word(),
            'created_at' => \Carbon\Carbon::now()->addDays(rand(-5, 5))->addHours(rand(-5, 5))->addMinutes(rand(-60, 60))->addSeconds(rand(-60, 60))
        ];
    }
}

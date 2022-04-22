<?php

namespace Database\Factories;

use App\Models\WebPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebPageFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'title' => $this->faker->text(rand(50, 200)),
            'html' => $this->faker->realTextBetween(100, 500, 3)
        ];
    }
}

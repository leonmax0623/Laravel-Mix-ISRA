<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $title = $this->faker->text(rand(20, 255));
        $description = $this->faker->realText(rand(255, 2047));
        $preview = \Illuminate\Support\Str::of($description)->limit(127);

        $title_translatable = [];
        $preview_translatable = [];
        $description_translatable = [];

        foreach(config('app.locales') as $locale_code => $locale_name) {
            $title_translatable[$locale_code] = $title;
            $preview_translatable[$locale_code] = $preview;
            $description_translatable[$locale_code] = $description;
        }

        return [
            'title' => $title_translatable,
            'preview' => $preview_translatable,
            'description' => $description_translatable
        ];
    }
}

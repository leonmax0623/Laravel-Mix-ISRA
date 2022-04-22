<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin_users = \App\Models\User::role('admin')->get()->collect();

        \App\Models\Blog\Post::factory(50)->make()->each(function($post) use ($admin_users) {
            $post->user()->associate($admin_users->random());

            $filename = 'blog/posts/' . microtime(true) . '.png';
            \Illuminate\Support\Facades\Storage::disk('public')->put($filename, file_get_contents((\Faker\Factory::create())->image(NULL, 380, 240, null, true, false, '380 x 240', true)));

            $post->save();

            $post->image()->save(\App\Models\Image::create(['file' => $filename]));
        });
    }
}

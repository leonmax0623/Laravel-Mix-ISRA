<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebPageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $slugs = ['about-us', 'how-it-works', 'prices', 'storage-rules', 'terms', 'privacy'];

        foreach($slugs as $slug) {
            \App\Models\WebPage::factory()->makeOne([
                'slug' => $slug
            ])->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VirtualBoxSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for($i = 0; $i < 300; $i++) {
            \App\Models\VirtualBox::create([
                'name' => sprintf('VB-%d', $i + 1)
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(BranchSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CallbackRequestSeeder::class);
        $this->call(TaskManagerTaskSeeder::class);
        $this->call(VirtualBoxSeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(WebPageSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}

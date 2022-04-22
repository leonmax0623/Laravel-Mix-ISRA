<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CallbackRequestSeeder extends Seeder {
    public function run() {
        $faker = \Faker\Factory::create();
        $users = \App\Models\User::all()->collect();
        $admin_users = \App\Models\User::role('admin')->get()->collect();

        \App\Models\CallbackRequest::factory(50)->make()->each(function($callbackRequest) use ($users, $admin_users, $faker) {
            if(rand(0, 1)) {
                $user = $users->random();

                $callbackRequest->user()->associate($user);
                $callbackRequest->name = $user->full_name;
            }

            $callbackRequest->save();

            for($i = 0; $i < rand(0, 3); $i++) {
                $callbackRequestNote = new \App\Models\CallbackRequestNote();
                $callbackRequestNote->callbackRequest()->associate($callbackRequest);
                $callbackRequestNote->user()->associate($admin_users->random());
                $callbackRequestNote->text = $faker->realText(rand(20, 50));

                $callbackRequestNote->save();
            }
        });
    }
}

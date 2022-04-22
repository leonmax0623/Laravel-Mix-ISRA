<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        \App\Models\User::factory(1)->make()->each(function($user) {
            $user->first_name = 'Aliaksandr';
            $user->last_name = 'Tumash';
            $user->email = 'cm.tumkin@yandex.ru';
            $user->password = \Hash::make('cm.tumkin@yandex.ru');

            $user->role_id = config('enum.role.admin.id');
            $user->country_id = config('enum.country.russia.id');
            $user->language_id = config('enum.language.russian.id');
            $user->sex_id = config('enum.sex.male.id');
            $user->client_type_id = config('enum.client_type.individual.id');

            $user->save();
        });

        \App\Models\User::factory(300)->make()->each(function($user) {
            $user->role_id = collect(config('enum.role'))->random()['id'];
            $user->country_id = collect(config('enum.country'))->random()['id'];
            $user->language_id = collect(config('enum.language'))->random()['id'];
            $user->sex_id = collect(config('enum.sex'))->random()['id'];
            $user->client_type_id = collect(config('enum.client_type'))->random()['id'];

            $user->save();
        });
    }
}

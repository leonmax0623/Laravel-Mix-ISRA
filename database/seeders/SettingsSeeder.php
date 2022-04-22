<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        settings()->flush();

        $settings = [
            'messengers_signal' => 'https://signal.org',
            'messengers_messenger' => 'https://www.messenger.com',
            'messengers_whatsapp' => 'https://www.whatsapp.com',
            'messengers_viber' => 'https://www.viber.com',
            'messengers_telegram' => 'https://telegram.org',

            'socials_youtube' => 'https://www.youtube.com',
            'socials_instagram' => 'https://www.instagram.com',
            'socials_facebook' => 'https://www.facebook.com',

            'contacts_phone' => '077-3609990',
            'contacts_email' => 'info@israstorage.co.il',
            'contacts_legal_address_registration_number' => [
                'en' => '515637189',
                'fr' => '515637189',
                'he' => '515637189',
                'ru' => '515637189'
            ],
            'contacts_legal_address_address' => [
                'en' => 'HaEshel 7, Caesarea Business Park South, Caesarea 3079504',
                'fr' => 'HaEshel 7, Caesarea Business Park South, Caesarea 3079504',
                'he' => 'האשל 7, פארק העסקים קיסריה דרום. קיסריה 3079504',
                'ru' => '3079504 Кейсария, улица аЭшель 7'
            ],
            'contacts_legal_address_description' => [
                'en' => 'Hours of Operations:' . PHP_EOL . 'Sunday-Thursday: 09:00-16:00' . PHP_EOL . 'Friday-Saturday: Closed',
                'fr' => 'Horaires:' . PHP_EOL . 'Dimanche-Jeudi: 09:00-16:00' . PHP_EOL . 'Vendredi-Samedi: Fermé',
                'he' => 'שעות פעילות:' . PHP_EOL . 'ראשון – חמישי :09:00 – 16:00.' . PHP_EOL . 'שישי  – שבת: סגור.',
                'ru' => 'Часы работы:' . PHP_EOL . 'воскресенье-четверг: 09:00-16:00' . PHP_EOL . 'пятница-суббота: выходные дни'
            ],

            'price_box_storage' => 30,
            'price_box_rent' => 1,
            'price_bulky_item_storage' => 50,
            'price_pallet_storage' => 130,
            'price_pallet_cubic_meter_storage' => 50
        ];

        $image_filename = 'blog/posts/' . microtime(true) . '.png';
        \Illuminate\Support\Facades\Storage::disk('public')->put($image_filename, file_get_contents($faker->image(NULL, 90, 90, null, true, false, '90 x 90', true)));

        for($i = 1; $i <= 15; $i++) {
            $name = $faker->name();
            $text = $faker->realText(rand(100, 300));

            $testimonial = [];

            foreach(config('app.locales') as $locale_code => $locale_name) {
                $testimonial['fullname'][$locale_code] = $name;
                $testimonial['testimonial'][$locale_code] = $text;
            }

            $testimonial['date'] = \Illuminate\Support\Carbon::now()->addDays(rand(-30, 30))->format('d.m.Y');
            $testimonial['image'] = $image_filename;

            $settings['pages_testimonials'][$i] = $testimonial;
        }

        for($i = 1; $i <= 5; $i++) {
            $title = $faker->realText(rand(15, 63));
            $text = $faker->realText(rand(30, 127));

            $slider = [];

            foreach(config('app.locales') as $locale_code => $locale_name) {
                $slider['title'][$locale_code] = $title;
                $slider['text'][$locale_code] = $text;
            }

            $settings['pages_home_slider'][$i] = $slider;
        }

        $image_filename = 'blog/posts/' . microtime(true) . '.png';
        \Illuminate\Support\Facades\Storage::disk('public')->put($image_filename, file_get_contents($faker->image(NULL, 280, 190, null, true, false, '280 x 190', true)));

        for($i = 0; $i < 10; $i++) {
            $settings['pages_home_image_gallery'][] = $image_filename;
        }

        settings()->set($settings);
        settings()->save();
    }
}

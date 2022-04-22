<?php

namespace Database\Seeders;

use App\Models\Order\Type as OrderType;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder {
    public function run() {
        collect([
            [
                'slug' => 'storage-in-boxes',
                'name' => ['en' => 'Storage of things in plastic boxes in the warehouse', 'ru' => 'Хранение вещей в пластиковых боксах на складе'],
                'short_name' => ['en' => 'Storage in boxes', 'ru' => 'Хранение в коробках'],
                'has_boxes' => true,
                'has_bulky_items' => true
            ],
            [
                'slug' => 'storage-on-pallets',
                'name' => ['en' => 'Storage on pallets in a warehouse (for business only)', 'ru' => 'Хранение на паллетах на складе (только для бизнеса)'],
                'short_name' => ['en' => 'Storage on pallets', 'ru' => 'Хранение на паллетах'],
                'has_pallets' => true
            ],
            [
                'slug' => 'storage-in-volume',
                'name' => ['en' => 'Storage in m³', 'ru' => 'Хранение в м³'],
                'short_name' => ['en' => 'Storage in m', 'ru' => 'Хранение в м³'],
            ],
            [
                'slug' => 'rent-of-boxes',
                'name' => ['en' => 'Rent of plastic boxes for moving', 'ru' => 'Аренда пластиковых боксов для переезда'],
                'short_name' => ['en' => 'Rental of boxes', 'ru' => 'Аренда боксов'],
                'has_boxes' => true
            ],
            [
                'slug' => 'return',
                'name' => ['en' => 'Return of items', 'ru' => 'Возврат вещей'],
                'short_name' => ['en' => 'Return', 'ru' => 'Возврат'],
                'has_boxes' => true
            ],
        ])->each(function($data) {
            \App\Models\Service::create($data);
        });
    }
}

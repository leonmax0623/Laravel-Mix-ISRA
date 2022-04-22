<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run() {
        $product = new Product();
        $product->title = ['en' => 'Packing tape', 'ru' => 'Упаковочная лента'];
        $product->description = ['en' => '48mm x 50m', 'ru' => '48мм x 50м'];
        $product->price = 20;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Bubblewrap', 'ru' => 'Пузырчатая обертка'];
        $product->description = ['en' => '0.5m x 20m', 'ru' => '0.5м x 20м'];
        $product->price = 200;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Packing tape', 'ru' => 'Упаковочная лента'];
        $product->description = ['en' => 'Width: 6"', 'ru' => 'Ширина: 6"'];
        $product->price = 45;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Vacuum storage bags', 'ru' => 'Вакуумные пакеты для хранения'];
        $product->description = ['en' => '', 'ru' => ''];
        $product->price = 25;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Vacuum storage bag', 'ru' => 'Вакуумный мешок для хранения'];
        $product->description = ['en' => '90cm x 60cm', 'ru' => '90см x 60см'];
        $product->price = 20;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Vacuum storage bags', 'ru' => 'Вакуумные пакеты для хранения'];
        $product->description = ['en' => '', 'ru' => ''];
        $product->price = 25;
        $product->save();

        $product = new Product();
        $product->title = ['en' => 'Gun + adhesive tape', 'ru' => 'Пистолет + клейкая лента'];
        $product->description = ['en' => '', 'ru' => ''];
        $product->price = 50;
        $product->save();
    }
}

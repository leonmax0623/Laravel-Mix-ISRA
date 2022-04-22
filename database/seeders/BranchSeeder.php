<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        collect([
            [
                'name' => ['en' => 'Caesarea Branch', 'fr' => 'Depot Caesarea', 'he' => 'סניף קיסריה', 'ru' => 'Кейсария – Север'],
                'address' => ['en' => 'HaEshel 7, Caesarea Business Park South, Caesarea 3079504', 'fr' => 'HaEshel 7, Caesarea Business Park South, Caesarea 3079504', 'he' => 'האשל 7 ,פארק העסקים קיסריה דרום. קיסריה 3079504', 'ru' => '3079504 Кейсария, улица ХаЭшель 7, Бизнес-парк «Юг»'],
                'service_area' => ['en' => 'Natanya, Hadera, Or Akiva, Herzliya, Kfar Saba, Raanana, Tel Aviv, Petah Tikvah, and surrounding areas.', 'fr' => 'Natanya, Hadera, Or Akiva, Herzliya, Kfar Saba, Raanana, Tel Aviv, Petah Tikvah, et alentours.', 'he' => 'נתניה, חדרה, אור עקיבא, הרצליה, כפר סבא, רעננה, תל אביב, פתח תקווה ויישובים נוספים.', 'ru' => 'Нетания, Хадера, Ор Акива, Герцелия, Кфар-Саба, Раанана, Тель-Авив, Петах-Тиква, Бней Брак, и прилегающие населенные пункты.'],
                'map_google_url' => 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2245.7977383355415!2d34.89077329742925!3d32.50224431772345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sGalileo%20House%201%2C%20house%20B%2C%207%2C%20Hashel%20Street%2C%206%2C%20Southern%20Industrial%20Park%20of%20Caesarea%2C%203079504!5e0!3m2!1sru!2sru!4v1625919606539!5m2!1sru!2sru'
            ],
            [
                'name' => ['en' => 'Kannot Branch', 'fr' => 'Depot Kannot', 'he' => 'סניף כנות', 'ru' => 'Канот – Юг'],
                'address' => ['en' => 'HaYarok 85, Kannot Business Park, Kannot 7982500', 'fr' => 'HaYarok 85, Kannot Business Park, Kannot 7982500', 'he' => '7982500 הירוק 85 ,פארק העסקים כנות. כנות', 'ru' => '7982500, Канот, улица ХаЯрок 85, Бизнес-парк Канот'],
                'service_area' => ['en' => 'Jerusalem, Tel Aviv, Ashdod, Ashkelon, Beer-Sheva, Yavne, Ramla, Lod, and surrounding areas.', 'fr' => 'Jerusalem, Tel Aviv, Ashdod, Ashkelon, Beer-Sheva, Yavne, Ramla, Lod, and surrounding areas.', 'he' => 'ירושלים, תל אביב, אשדוד, אשקלון, באר שבע, יבנה, רמלה, לוד ויישובים נוספים.', 'ru' => 'Иерусалим, Тель-Авив, Ашдод, Ашкелон, Беэр Шева, Явне, Рамла, Лод, и прилегающие населенные пункты.'],
                'map_google_url' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13563.158930410775!2d34.758058!3d31.80348!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sus!4v1626867345262!5m2!1sru!2sus'
            ],
            [
                'name' => ['en' => 'Haifa Branch', 'fr' => 'Depot Haifa', 'he' => 'סניף חיפה', 'ru' => 'Хайфа ХаМифрац'],
                'address' => ['en' => 'Yegi\'a Kapayim 1/Yulius Simon 31, HaMifrats Haifa, Haifa 2629901', 'fr' => 'Yegi\'a Kapayim 1/Yulius Simon 31, HaMifrats Haifa, Haifa 2629901', 'he' => '2629901 איזורי שירות: מפרץ חיפה, יגיע כפיים 1 / יוליוס סימון 31 .חיפה', 'ru' => '2629901, Хайфа ХаМифрац, улица Ягиа Капайм 1/Юлиус Саймон 31'],
                'service_area' => ['en' => 'Haifa, Yoknam Illit, Kiryat Motskin, Kiryat Bialik, Kiryat Ata, Kiryat Yam, Atlit, Tiberias, and surrounding areas.', 'fr' => 'Haifa, Yoknam Illit, Kiryat Motskin, Kiryat Bialik, Kiryat Ata, Kiryat Yam, Atlit, Tiberias, and surrounding areas.', 'he' => 'חיפה, יקנעם עילית, קריית מוצקין, קריית ביאליק, קריית אתא, קריית ים, עתלית, טבריה ויישובים נוספים', 'ru' => 'Хайфа, Йокнам Илит, Кирьят Моцкин, Кирьят Биалик, Кирьят Ата, Кирьят Ям, Атлит, Тверия, и прилегающие населенные пункты.'],
                'map_google_url' => 'https://www.google.com/maps/embed?pb=!1m16!1m8!1m3!1d13412.243044358916!2d35.048862!3d32.817155!3m2!1i1024!2i768!4f13.1!4m5!3e0!4m3!3m2!1d32.817155!2d35.048862!5e0!3m2!1sru!2sru!4v1626867202402!5m2!1sru!2sru'
            ]
        ])->each(function($data) {
            \App\Models\Branch::create($data);
        });
    }
}

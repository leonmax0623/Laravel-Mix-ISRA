<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Order::truncate();
        \App\Models\Invoice::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users_clients = \App\Models\User::role('client')->get()->collect();
        $services = \App\Models\Service::all()->collect();

        \App\Models\Order::factory(100)->make()->each(function($order) use ($users_clients, $services, $faker) {
             $order->user()->associate($users_clients->random());
             $order->service()->associate($services->random());

             $order->save();

             $invoices_count = rand(0, 3);
             for($i = 0; $i < $invoices_count; $i++) {
                 $invoice = new \App\Models\Invoice();
                 $invoice->order()->associate($order);
                 $invoice->payment_type_id = collect(config('enum.payment_type'))->random()['id'];
                 $invoice->number = rand();
                 $invoice->amount = rand(100, 1000);
                 $invoice->comment = $faker->text(rand(50, 150));
                 $invoice->status = rand(0, 1);
                 $invoice->payment_date = \Carbon\Carbon::now();
                 $invoice->expiry_date = \Carbon\Carbon::now()->addDays(rand(1, 5))->addHours(rand(1, 24))->addMinutes(rand(1, 60));

                 $invoice->save();
             }
        });
    }
}

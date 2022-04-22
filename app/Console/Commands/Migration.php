<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Migration extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'old:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $old = DB::connection('mysql_old');
        $new = DB::connection('mysql');

        $new->statement('SET FOREIGN_KEY_CHECKS=0');
        $new->table('users')->truncate();
        $new->table('orders')->truncate();
        $new->table('orders_boxes')->truncate();
        $new->table('orders_bulky_items')->truncate();
        $new->table('orders_pallets')->truncate();
        $new->table('orders_products')->truncate();
        $new->table('orders_totals')->truncate();
        $new->table('virtual_boxes')->truncate();
        $new->statement('SET FOREIGN_KEY_CHECKS=1');

        $user_links = [];
        $order_links = [];
        $virtual_box_links = [];

        $this->warn('RUN VIRTUAL BOXES MIGRATION!');
        foreach($old->table('osc_o_boxes')->get() as $o_virtual_box) {
            $virtual_box = new \App\Models\VirtualBox();
            $virtual_box->name = $o_virtual_box->article;
            $virtual_box->created_at = $o_virtual_box->created;
            $virtual_box->updated_at = $o_virtual_box->modified;

            $virtual_box->save();

            $virtual_box_links[$o_virtual_box->id] = $virtual_box->id;
        }

        $this->warn('RUN USERS MIGRATION!');
        foreach($old->table('osc_users')->get() as $i => $o_user) {
            try {
                if($o_user->fname == '0') {
                    $o_user->fname = '';
                }

                if($o_user->lname == '0') {
                    $o_user->lname = '';
                }

                $user = new \App\Models\User();

                $user->first_name = $o_user->fname;
                $user->last_name = $o_user->lname;
                $user->email = !empty($o_user->login) ? $o_user->login : $o_user->email;
                $user->address_city = $o_user->city;
                $user->address_street = $o_user->street;
                $user->address_index = $o_user->zipcode;
                $user->address_house = $o_user->house;
                $user->entrance_floor = (int)$o_user->floor;
                $user->entrance_elevator = (bool)$o_user->lift;
                $user->entrance_apartment = $o_user->flat;
                $user->entrance_code = $o_user->intercom;
                $user->passport_number = $o_user->int_passport;
                $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
    //            $user->password = \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(128));
                $user->phone = !empty($o_user->phone) ? $o_user->phone : $o_user->second_phone;
                $user->language()->associate(1);
                $user->country()->associate(1);
                $user->sex()->associate(match($o_user->male) {
                    'Ж' => 3,
                    'М' => 2,
                    default => 1
                });
                $user->role()->associate(4);
                $user->created_at = $o_user->dateCreate;

                if((int)$o_user->alt_user > 0) {
                    if($o_user_alt = $old->table('osc_alt_users')->where('id', '=', $o_user->alt_user)->first()) {
                        if(empty($user->phone)) {
                            $user->phone = !empty($o_user_alt->phone) ? $o_user_alt->phone : $o_user_alt->second_phone;
                        }

                        $user->language()->associate(match($o_user_alt->locale) {
                            'ru_' => 5,
                            'fr_' => 4,
                            'en_' => 2,
                            default => 3
                        });
                    }
                }

                $user->save();

                $user_links[$o_user->id] = $user->id;
            } catch (\Exception $e) {
                dump($e->getMessage() . ' - ' . $e->getLine());
            }
        }

        $this->warn('RUN ORDERS MIGRATION!');
        foreach($old->table('osc_o_orders')->get() as $i => $o_order) {
            try {
                $o_order->description = json_decode($o_order->description);

                $order = new \App\Models\Order();

                $order->user_id = $user_links[$o_order->user_id];
                $order->service_id = match ($o_order->kind_id) {
                    1 => 1,
                    2 => 2,
                    3 => 3
                };
                $order->order_status_id = match ($o_order->status) {
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5
                };
                $order->payment_status_id = match ($o_order->pay_status_id) {
                    1 => 1,
                    2 => 2,
                    3 => 3
                };
                $order->payment_type_id = match ($o_order->pay_method_id) {
                    1 => 1,
                    2 => 2,
                    3 => 3
                };
                $order->branch_id = match ($o_order->branch_id) {
                    1 => 1,
                    2 => 2,
                    3 => 3
                };
                $order->delivery_datetime = $o_order->delivery_date;
                $order->pickup_datetime = $o_order->pickup_date;
                $order->expiry_date = $o_order->finish_date;
                $order->phone_1 = $o_order->description->phone ?? '';
                $order->phone_2 = $o_order->description->second_phone ?? '';
                $order->address_index = $o_order->description->zipcode ?? '';
                $order->address_city = $o_order->description->city ?? '';
                $order->address_street = $o_order->description->street ?? '';
                $order->address_house = $o_order->description->house ?? '';
                $order->entrance_code = $o_order->description->intercom ?? '';
                $order->entrance_floor = $o_order->description->floor ?? '';
                $order->entrance_apartment = $o_order->description->flat ?? '';
                $order->entrance_elevator = (bool)($o_order->description->lift ?? false);
                $order->comment = $o_order->description->comment ?? '';
                $order->rivhit = $o_order->buch_num;
                $order->location = $o_order->location_name;
                $order->created_at = $o_order->created;
                $order->updated_at = $o_order->modified;

                $order->save();

                $o_boxes = $old->table('osc_o_orders_boxes')->where('order_id', '=', $o_order->id)->get();
                foreach($o_boxes as $o_box) {
                    if($o_box->box_kind_id == 1) {
                        $box = new \App\Models\Order\Box();
                        $box->order_id = $order->id;
                        $box->comment = $o_box->comment;
                        $box->created_at = $o_box->created;

                        if((int)$o_box->box_id > 0) {
                            $box->virtual_box_id = $virtual_box_links[$o_box->box_id];
                        }

                        $box->save();
                    } elseif($o_box->box_kind_id == 2) {
                        $bulky_item = new \App\Models\Order\BulkyItem();
                        $bulky_item->order_id = $order->id;
                        $bulky_item->comment = $o_box->comment;
                        $bulky_item->created_at = $o_box->created;

                        $bulky_item->save();
                    } elseif($o_box->box_kind_id == 3) {
                        $pallet = new \App\Models\Order\Pallet();
                        $pallet->order_id = $order->id;
                        $pallet->comment = $o_box->comment;
                        $pallet->created_at = $o_box->created;

                        $pallet->save();
                    }
                }

                $order_links[$o_order->id] = $order->id;
            } catch (\Exception $e) {
                dump($e->getMessage() . ' - ' . $e->getLine());
            }
        }

        $this->warn('RUN ORDER INVOICES MIGRATION!');
        foreach($old->table('osc_o_orders_invoices')->get() as $i => $o_order_invoice) {
            try {
                $order_invoice = new \App\Models\Invoice();
                $order_invoice->order_id = $order_links[$o_order_invoice->order_id];
                $order_invoice->payment_type_id = match($o_order_invoice->pay_method) {
                    'Банковский перевод' => 4,
                    'Наличный расчет' => 2,
                    'Оплата картой' => 1,
                    'Credit Card' => 1,
                    'Bank Wire' => 4,
                    'Cash' => 2
                };
                $order_invoice->number = $o_order_invoice->invoice_num;
                $order_invoice->amount = $o_order_invoice->invoice_sum;
                $order_invoice->comment = $o_order_invoice->comment;
                $order_invoice->status = $o_order_invoice->is_payed;
                $order_invoice->payment_date = $o_order_invoice->pay_date;
                $order_invoice->expiry_date = $o_order_invoice->deadline_date;
                $order_invoice->created_at = $o_order_invoice->created;

                $order_invoice->save();
            } catch (\Exception $e) {
                dump($e->getMessage() . ' - ' . $e->getLine());
            }
        }

        return 0;
    }
}

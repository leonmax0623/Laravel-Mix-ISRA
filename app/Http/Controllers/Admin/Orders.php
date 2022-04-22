<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\OrdersExport;

class Orders extends Controller {
    public function index() {
        $orders_filter = [
            'filter_order_status_id' => request()->get('filter_order_status_id'),
            'filter_payment_status_id' => request()->get('filter_payment_status_id'),
            'filter_branch_id' => request()->get('filter_branch_id'),
            'filter_service_id' => request()->get('filter_service_id'),
            'filter_client_type_id' => request()->get('filter_client_type_id')
        ];

        $orders = \App\Models\Order::with(['branch', 'user', 'invoices'])->orderByDesc('id');

        if(request()->has('filter_order_status_id')) {
            $orders->where('order_status_id', '=', request()->get('filter_order_status_id'));
        }

        if(request()->has('filter_payment_status_id')) {
            $orders->where('payment_status_id', '=', request()->get('filter_payment_status_id'));
        }

        if(request()->has('filter_branch_id')) {
            $orders->where('branch_id', '=', request()->get('filter_branch_id'));
        }

        if(request()->has('filter_service_id')) {
            $orders->where('service_id', '=', request()->get('filter_service_id'));
        }

        if(request()->has('filter_client_type_id')) {
            $orders->whereHas('user', function($query) {
                $query->where('client_type_id', '=', request()->get('filter_client_type_id'));
            });
        }

        $orders = $orders->paginate(25);
        $orders->appends($orders_filter);

        return view('admin.pages.order.index', [
            'filter' => $orders_filter,
            'orders' => $orders
        ]);
    }

    public function create() {
        return view('admin.pages.order.create');
    }

    public function store(Request $request) {
        $validator = Validator::make(request()->input(), [
            'user_id' => ['required'],
            'service_id' => ['required'],
            'branch_id' => ['required'],
            'order_status_id' => ['required'],
            'payment_status_id' => ['required'],
            'payment_type_id' => ['required'],
            'delivery_datetime' => ['required', 'date_format:"d.m.Y H:i"'],
            'pickup_datetime' => ['required', 'date_format:"d.m.Y H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'address_index' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_house' => ['required'],
            'phone_1' => ['required']
        ]);

        $validator->validate();

        $data = request()->input();
        $data['delivery_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', request()->input('delivery_datetime'));
        $data['pickup_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', request()->input('pickup_datetime'));
        $data['expiry_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('expiry_date'));
        $data['entrance_elevator'] = request()->input('entrance_elevator', false);

        $order = \App\Models\Order::create($data);

        $this->attachItems($order);

        $total_invoice = 0;

        if(request()->has('box') && is_countable(request()->get('box'))) {
            foreach(request()->get('box') as $box_info) {
                $total_invoice += isset($box_info['rent']) ? settings()->get('price_box_rent') : settings()->get('price_box_storage');
            }
        }

        if(request()->has('bulky_item') && is_countable(request()->get('bulky_item'))) {
            $total_invoice += count(request()->get('bulky_item')) * settings()->get('price_bulky_item_storage');
        }

        if(request()->has('pallet') && is_countable(request()->get('pallet'))) {
            $total_invoice += count(request()->get('pallet')) * settings()->get('price_pallet_storage');
        }

        if(request()->has('product') && is_countable(request()->get('product'))) {
            foreach(request()->get('product') as $product_info) {
                $product = \App\Models\Product::find($product_info['id']);

                $total_invoice += $product->price * $product_info['count'];
            }
        }


        if(request()->has('volume') && is_numeric(request()->get('volume')) && (float)request()->get('volume') > 0) {
            $total_invoice += (float)request()->get('volume') * settings()->get('price_pallet_cubic_meter_storage');
        }

        $order->invoices()->create([
            'payment_type_id' => $order->payment_type_id,
            'number' => '',
            'amount' => $total_invoice,
            'comment' => 'Created automatically during checkout.',
            'payment_date' => \Carbon\Carbon::now(),
            'expiry_date' => \Carbon\Carbon::now()
        ]);

        return response()->json([
            'status' => true,
            'redirect' => route('admin.orders.edit', $order->id)
        ]);
    }

    public function edit($id) {
        $order = \App\Models\Order::findOrFail($id);

        return view('admin.pages.order.edit', [
            'order' => $order
        ]);
    }

    public function update($id) {
        $order = \App\Models\Order::findOrFail($id);

        $validator = Validator::make(request()->input(), [
            'service_id' => ['required'],
            'branch_id' => ['required'],
            'order_status_id' => ['required'],
            'payment_status_id' => ['required'],
            'payment_type_id' => ['required'],
            'delivery_datetime' => ['required', 'date_format:"d.m.Y H:i"'],
            'pickup_datetime' => ['required', 'date_format:"d.m.Y H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'address_index' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_house' => ['required'],
            'phone_1' => ['required']
        ]);

        $validator->validate();

        $data = request()->input();
        $data['delivery_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', request()->input('delivery_datetime'));
        $data['pickup_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', request()->input('pickup_datetime'));
        $data['expiry_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('expiry_date'));
        $data['entrance_elevator'] = request()->input('entrance_elevator', false);

        $order->update($data);

        $this->attachItems($order);

        return response()->json([
            'status' => true,
            'redirect' => route('admin.orders.edit', $order->id)
        ]);
    }

    public function destroy($id) {
        $order = \App\Models\Order::findOrFail($id);

        $order->boxes()->delete();
        $order->pallets()->delete();
        $order->bulkyItems()->delete();
        $order->products()->detach();
        $order->invoices()->delete();
        $order->delete();

        return response()->redirectToRoute('admin.orders.index');
    }

    private function attachItems($order) {
        $boxes = collect(request()->input('box', []))->map(function($box_info, $box_id) use ($order) {
            $box = \App\Models\Order\Box::findOrNew($box_id);
            $box->comment = $box_info['comment'] ?? NULL;
            $box->order()->associate($order);
            $box->virtualBox()->associate($box_info['virtual_box_id'] ?? NULL);
            $box->save();

            if(isset($box_info['image']) && !empty($box_info['image'])) {
                if(!$box->image) {
                    $box->image()->save(\App\Models\Image::create(['file' => $box_info['image']]));
                } else {
                    $box->image->update(['file' => $box_info['image']]);
                }
            } else {
                $box->image()->delete();
            }

            $box->is_rent = isset($box_info['rent']);

            return $box;
        });

        $order->boxes()->whereNotIn('id', $boxes->pluck('id')->toArray())->get()->each->delete();
        $order->boxes()->saveMany($boxes);


        $bulky_items = collect(request()->input('bulky_item', []))->map(function($bulky_item_info, $bulky_item_id) use ($order) {
            $bulky_item = \App\Models\Order\BulkyItem::findOrNew($bulky_item_id);
            $bulky_item->comment = $bulky_item_info['comment'] ?? NULL;
            $bulky_item->order()->associate($order);
            $bulky_item->save();

            if(isset($bulky_item_info['image']) && !empty($bulky_item_info['image'])) {
                if(!$bulky_item->image) {
                    $bulky_item->image()->save(\App\Models\Image::create(['file' => $bulky_item_info['image']]));
                } else {
                    $bulky_item->image->update(['file' => $bulky_item_info['image']]);
                }
            } else {
                $bulky_item->image()->delete();
            }

            return $bulky_item;
        });

        $order->bulkyItems()->whereNotIn('id', $bulky_items->pluck('id')->toArray())->get()->each->delete();
        $order->bulkyItems()->saveMany($bulky_items);

        $images = collect(request()->input('image', []))->map(function($image_info, $image_id) use ($order) {
            $image = \App\Models\Order\Images::findOrNew($image_id);
            $image->comment = $image_info['comment'] ?? NULL;
            $image->order()->associate($order);
            $image->save();

            if(isset($image_info['image']) && !empty($image_info['image'])) {
                if(!$image->image) {
                    $image->image()->save(\App\Models\Image::create(['file' => $image_info['image']]));
                } else {
                    $image->image->update(['file' => $image_info['image']]);
                }
            } else {
                $image->image()->delete();
            }

            return $image;
        });

        $order->images()->whereNotIn('id', $images->pluck('id')->toArray())->get()->each->delete();
        $order->images()->saveMany($images);


        $pallets = collect(request()->input('pallet', []))->map(function($pallet_info, $pallet_id) use ($order) {
            $pallet = \App\Models\Order\Pallet::findOrNew($pallet_id);
            $pallet->comment = $pallet_info['comment'] ?? NULL;
            $pallet->order()->associate($order);
            $pallet->save();

            if(isset($pallet_info['image']) && !empty($pallet_info['image'])) {
                if(!$pallet->image) {
                    $pallet->image()->save(\App\Models\Image::create(['file' => $pallet_info['image']]));
                } else {
                    $pallet->image->update(['file' => $pallet_info['image']]);
                }
            } else {
                $pallet->image()->delete();
            }

            return $pallet;
        });

        $order->pallets()->whereNotIn('id', $pallets->pluck('id')->toArray())->get()->each->delete();
        $order->pallets()->saveMany($pallets);

        $order->products()->detach();
        $products = collect(request()->input('product', []))
            ->groupBy('id')
            ->map(function($collection) {
                $element = $collection->first();
                $element['count'] = $collection->sum('count');

                return $element;
            })
            ->map(function($product_info) use ($order) {
                $product = \App\Models\Product::find($product_info['id']);

                if($product && $product_info['count'] > 0) {
                    $order->products()->attach($product, ['count' => $product_info['count'], 'price' => $product->price]);
                }

                return $product;
            })
            ->filter(fn($product) => is_object($product));
    }
}

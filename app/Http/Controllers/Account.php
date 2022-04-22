<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\UpdateAddressRequest;
use App\Http\Requests\Account\UpdateAvatarRequest;
use App\Http\Requests\Account\UpdateEntranceRequest;
use App\Http\Requests\Account\UpdatePersonalInformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Account extends Controller {
    public function profile() {
        return view('application.pages.account-profile');
    }

    public function orders() {
        $orders = auth()->user()->orders()
            ->with(['service'])
            ->orderStatus('new', 'confirmed', 'active')
            ->orderByDesc('id')
            ->get();

        return view('application.pages.account-orders', [
            'orders' => $orders
        ]);
    }

    public function ordersHistory() {
        $orders = auth()->user()->orders()
            ->orderStatus('canceled', 'finished')
            ->with(['service'])
            ->orderByDesc('id')
            ->get();

        return view('application.pages.account-orders-history', [
            'orders' => $orders
        ]);
    }

    public function ordersCreate() {
        $list = [
            ['service' => \App\Models\Service::where('slug', '=', 'storage-in-boxes')->firstOrFail(), 'route' => 'account.orders.create.storage-in-boxes'],
            ['service' => \App\Models\Service::where('slug', '=', 'storage-on-pallets')->firstOrFail(), 'route' => 'account.orders.create.storage-on-pallets'],
            ['service' => \App\Models\Service::where('slug', '=', 'rent-of-boxes')->firstOrFail(), 'route' => 'account.orders.create.rent-of-boxes'],
            ['service' => \App\Models\Service::where('slug', '=', 'storage-in-volume')->firstOrFail(), 'route' => 'account.orders.create.storage-in-volume'],
            ['service' => \App\Models\Service::where('slug', '=', 'return')->firstOrFail(), 'route' => 'account.orders.create.return'],
        ];

        return view('application.pages.account-orders-create', [
            'list' => $list
        ]);
    }

    public function ordersCreateStorageInBoxes() {
        $service = \App\Models\Service::where('slug', '=', 'storage-in-boxes')->firstOrFail();

        if(request()->isMethod('post')) {
            return $this->callAction('ordersCreateStorageInBoxesStore', [$service]);
        }

        return view('application.pages.account-orders-create-storage-in-boxes', [
            'service' => $service
        ]);
    }

    protected function ordersCreateStorageInBoxesStore($service) {
        $validator = Validator::make(request()->input(), [
//            'boxes.count' => ['required'],
//            'bulky_items.count' => ['required'],
            'delivery_date' => ['required', 'date_format:"d.m.Y"'],
            'delivery_time' => ['required', 'date_format:"H:i"'],
            'pickup_date' => ['required', 'date_format:"d.m.Y"'],
            'pickup_time' => ['required', 'date_format:"H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'phone_1' => ['required'],
            'address_house' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_index' => ['required'],
            'agreement' => ['accepted']
        ]);

        $validator->validated();

        $order = \App\Models\Order::make($this->prepareOrderData());
        $order->user()->associate(auth()->user());
        $order->service()->associate($service);

        $order->save();

        $this->attachOrderItems($order);

        return response()->json([
            'status' => true,
            'message' => __('Your order has been successfully placed, we will contact you soon!')
        ]);
    }

    public function ordersCreateStorageOnPallets() {
        $service = \App\Models\Service::where('slug', '=', 'storage-on-pallets')->firstOrFail();

        if(request()->isMethod('post')) {
            return $this->callAction('ordersCreateStorageOnPalletsStore', [$service]);
        }

        return view('application.pages.account-orders-create-storage-on-pallets', [
            'service' => $service
        ]);
    }

    protected function ordersCreateStorageOnPalletsStore($service) {
        $validator = Validator::make(request()->input(), [
//            'boxes.count' => ['required'],
//            'bulky_items.count' => ['required'],
            'delivery_date' => ['required', 'date_format:"d.m.Y"'],
            'delivery_time' => ['required', 'date_format:"H:i"'],
            'pickup_date' => ['required', 'date_format:"d.m.Y"'],
            'pickup_time' => ['required', 'date_format:"H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'phone_1' => ['required'],
            'address_house' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_index' => ['required'],
            'agreement' => ['accepted']
        ]);

        $validator->validated();

        $order = \App\Models\Order::make($this->prepareOrderData());
        $order->user()->associate(auth()->user());
        $order->service()->associate($service);

        $order->save();

        $this->attachOrderItems($order);

        return response()->json([
            'status' => true,
            'message' => __('Your order has been successfully placed, we will contact you soon!')
        ]);
    }

    public function ordersCreateRentOfBoxes() {
        $service = \App\Models\Service::where('slug', '=', 'rent-of-boxes')->firstOrFail();

        if(request()->isMethod('post')) {
            return $this->callAction('ordersCreateRentOfBoxesStore', [$service]);
        }

        return view('application.pages.account-orders-create-rent-of-boxes', [
            'service' => $service
        ]);
    }

    protected function ordersCreateRentOfBoxesStore($service) {
        $validator = Validator::make(request()->input(), [
//            'boxes.count' => ['required'],
//            'bulky_items.count' => ['required'],
            'delivery_date' => ['required', 'date_format:"d.m.Y"'],
            'delivery_time' => ['required', 'date_format:"H:i"'],
            'pickup_date' => ['required', 'date_format:"d.m.Y"'],
            'pickup_time' => ['required', 'date_format:"H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'phone_1' => ['required'],
            'address_house' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_index' => ['required'],
            'agreement' => ['accepted']
        ]);

        $validator->validated();

        $order = \App\Models\Order::make($this->prepareOrderData());
        $order->user()->associate(auth()->user());
        $order->service()->associate($service);

        $order->save();

        $this->attachOrderItems($order);

        return response()->json([
            'status' => true,
            'message' => __('Your order has been successfully placed, we will contact you soon!')
        ]);
    }

    public function ordersCreateStorageInVolume() {
        $service = \App\Models\Service::where('slug', '=', 'storage-in-volume')->firstOrFail();

        if(request()->isMethod('post')) {
            return $this->callAction('ordersCreateStorageInVolumeStore', [$service]);
        }

        return view('application.pages.account-orders-create-storage-in-volume', [
            'service' => $service
        ]);
    }

    protected function ordersCreateStorageInVolumeStore($service) {
        $validator = Validator::make(request()->input(), [
//            'boxes.count' => ['required'],
//            'bulky_items.count' => ['required'],
            'delivery_date' => ['required', 'date_format:"d.m.Y"'],
            'delivery_time' => ['required', 'date_format:"H:i"'],
            'pickup_date' => ['required', 'date_format:"d.m.Y"'],
            'pickup_time' => ['required', 'date_format:"H:i"'],
            'expiry_date' => ['required', 'date_format:"d.m.Y"'],
            'phone_1' => ['required'],
            'address_house' => ['required'],
            'address_city' => ['required'],
            'address_street' => ['required'],
            'address_index' => ['required'],
            'agreement' => ['accepted']
        ]);

        $validator->validated();

        $order = \App\Models\Order::make($this->prepareOrderData());
        $order->user()->associate(auth()->user());
        $order->service()->associate($service);

        $order->save();

        $this->attachOrderItems($order);

        return response()->json([
            'status' => true,
            'message' => __('Your order has been successfully placed, we will contact you soon!')
        ]);
    }

    public function ordersCreateReturn() {
        $service = \App\Models\Service::where('slug', '=', 'return')->firstOrFail();

        if(request()->isMethod('post')) {
            return $this->callAction('ordersCreateReturnStore', [$service]);
        }

        $orders = auth()->user()->orders()->orderStatus('active')->get();

        return view('application.pages.account-orders-create-return', [
            'service' => $service,
            'orders' => $orders
        ]);
    }

    protected function ordersCreateReturnStore($service) {
        try {
            $order = auth()->user()->orders()->where('id', '=', request()->input('order_id'))->firstOrFail();
        } catch (\Exception $e) {
            $order = NULL;
        }

        \App\Models\CallbackRequest::create([
            'user_id' => $order->id,
            'email' => $order->user->email,
            'name' => $order->user->full_name,
            'phone' => $order->phone_1 ?? $order->phone_2 ?? $order->user->phone,
            'text' => __('Hello, I want to issue a refund of the order #:order_id, additional details: :details', ['order_id' => $order->id, 'details' => request()->input('comment')])
        ]);

        return response()->json([
            'status' => true,
            'message' => __('Your order has been successfully placed, we will contact you soon!')
        ]);
    }

    public function payments() {
        $invoices = auth()->user()->invoices()->get();

        return view('application.pages.account-payments', [
            'invoices' => $invoices
        ]);
    }

    public function profileUpdatePersonalInformation(UpdatePersonalInformationRequest $request) {
        $request->validated();

        $user = auth()->user();

        $user->update($request->all());

        return response()->json([
            'message' => __('The information was successfully updated!')
        ]);
    }

    public function profileUpdateAddress(UpdateAddressRequest $request) {
        $request->validated();

        $user = auth()->user();

        $user->update($request->all());

        return response()->json([
            'message' => __('The information was successfully updated!')
        ]);
    }

    public function profileUpdateEntrance(UpdateEntranceRequest $request) {
        $request->validated();

        $user = auth()->user();

        $user->update($request->all());

        return response()->json([
            'message' => __('The information was successfully updated!')
        ]);
    }

    public function profileUpdateAvatar(UpdateAvatarRequest $request) {
        $request->validated();

        $file = $request->file('avatar');

        if($file->isValid()) {
            $file = Storage::disk('public')->putFile('upload/avatars', $file);

            if(!auth()->user()->image->exists) {
                $image = auth()->user()->image()->create(['file' => $file]);
            } else {
                $image = auth()->user()->image;
                $image->update(['file' => $file]);
            }

            return response()->json([
                'message' => __('The avatar has been successfully updated!'),
                'avatar' => [
                    '64' => $image->getThumbUrl(64, 64),
                    '100' => $image->getThumbUrl(100, 100)
                ]
            ]);
        }

        return response()->json([
            'message' => __('An unknown error has occurred. Try again.')
        ]);
    }

    private function attachOrderItems(\App\Models\Order $order) {
        $total_price = 0;

        if(request()->has('boxes')) {
            $boxes = request()->input('boxes');
            if(is_array($boxes) && isset($boxes['count']) && isset($boxes['price'])) {
                for($i = 0; $i < $boxes['count']; $i++) {
                    $order->boxes()->create();

                    $total_price += $boxes['price'];
                }
            }
        }

        if(request()->has('bulky_items')) {
            $bulky_items = request()->input('bulky_items');
            if(is_array($bulky_items) && isset($bulky_items['count']) && isset($bulky_items['price'])) {
                for($i = 0; $i < $bulky_items['count']; $i++) {
                    $order->bulkyItems()->create();

                    $total_price += $bulky_items['price'];
                }
            }
        }

        if(request()->has('pallets')) {
            $pallets = request()->input('pallets');
            if(is_array($pallets) && isset($pallets['count']) && isset($pallets['price'])) {
                for($i = 0; $i < $pallets['count']; $i++) {
                    $order->pallets()->create();

                    $total_price += $pallets['price'];
                }
            }
        }

        if(request()->has('products')) {
            $products = request()->input('products');
            if(is_array($products)) {
                foreach($products as $product_id => $product_info) {
                    if(isset($product_info['count']) && isset($product_info['price']) && $product_info['count'] > 0) {
                        $order->products()->attach($product_id, [
                            'count' => $product_info['count'],
                            'price' => $product_info['price']
                        ]);

                        $total_price += $product_info['count'] * $product_info['price'];
                    }
                }
            }
        }

        if(request()->has('volumes')) {
            $volume = request()->input('volumes');
            if(is_array($volume) && isset($volume['count']) && isset($volume['price'])) {
                $total_price += $volume['count'] * $volume['price'];

                $order->update(['volume' => $volume['count']]);
            }
        }

        $order->invoices()->create([
            'payment_type_id' => $order->payment_type_id,
            'number' => '',
            'amount' => $total_price,
            'comment' => 'Created automatically during checkout.',
            'payment_date' => \Carbon\Carbon::now(),
            'expiry_date' => \Carbon\Carbon::now()
        ]);
    }

    private function prepareOrderData() {
        $data = request()->input();

        if(isset($data['delivery_date']) && isset($data['delivery_time'])) {
            $data['delivery_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', $data['delivery_date'] . ' ' . $data['delivery_time']);
        }

        if(isset($data['pickup_date']) && isset($data['pickup_time'])) {
            $data['pickup_datetime'] = \Carbon\Carbon::createFromFormat('d.m.Y H:i', $data['pickup_date'] . ' ' . $data['pickup_time']);
        }

        $data['expiry_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', $data['expiry_date']);

        return $data;
    }
}

<div class="on step{{ $step }} step-container" data-step="{{ $step }}">
    <div class="on-h">
        <div class="on-h-t">
            <h2 class="on-h-title">{{ $service->name }}</h2>
            <div class="on-h-subtitle">{{ __('Do you need other services?') }}</div>
        </div>
        <div class="on-h-step">
            <div class="on-h-step__text">{{ __('Step') }}</div>
            <div class="on-h-step__num">{{ $step }}/{{ $step_total }}</div>
        </div>
    </div>
    <div class="on-b">
        @foreach(\App\Models\Product::all() as $product)
            @include('application.components.order.product-item', ['title' => $product->title, 'price' => $product->price, 'description' => $product->description, 'image' => asset('storage/images/order-item-1.png'), 'name' => 'products[' . $product->id . ']'])
        @endforeach

        <div class="on-b-f">
            <a href="#" class="on-btn form-btn link-arrow prev step-btn-prev">{{ __('Back') }}</a>
            <a href="#" class="on-btn form-btn link-arrow next step-btn-next">{{ __('Continue') }}</a>
        </div>
    </div>
</div>

@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active steps-wrapper">
                <form id="form-create-order-storage-in-boxes" action="{{ route('account.orders.create.storage-in-boxes') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="on step1 step-container" data-step="1">
                        <div class="on-h">
                            <div class="on-h-t">
                                <h2 class="on-h-title">{{ $service->name }}</h2>
                            </div>
                            <div class="on-h-step">
                                <div class="on-h-step__text">{{ __('Step') }}</div>
                                <div class="on-h-step__num">1/4</div>
                            </div>
                        </div>
                        <div class="on-b">
                            @include('application.components.order.product-item', ['title' => __('Crate'), 'price' => settings()->get('price_box_storage', 0), 'description' => __('L60 x W40 x H40'), 'image' => asset('storage/images/order-item-1.png'), 'name' => 'boxes'])
                            @include('application.components.order.product-item', ['title' => __('Bulky Items'), 'price' => settings()->get('price_bulky_item_storage', 0), 'description' => __('One item up to 20 kilos and no more than 1500 mm in three dimensions'), 'image' => asset('storage/images/order-item-2.png'), 'name' => 'bulky_items'])

                            <div class="on-b-f">
                                <a href="#" class="on-btn form-btn link-arrow next step-btn-next">{{ __('Continue') }}</a>
                            </div>
                        </div>
                    </div>

                    @include('application.components.order.step-products', ['user' => auth()->user(), 'service' => $service, 'step' => 2, 'step_total' => 4])

                    @include('application.components.order.step-address', ['user' => auth()->user(), 'service' => $service, 'step' => 3, 'step_total' => 4])

                    @include('application.components.order.step-payment', ['user' => auth()->user(), 'service' => $service, 'step' => 4, 'step_total' => 4])
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active">
                <div class="my__wrapper">
                    <div class="on-h">
                        <h2 class="on-h-title">{{ __('My orders') }}</h2>
                    </div>
                    <div class="on-b my">
                        @if(count($orders))
                            @foreach($orders as $order)
                                <div class="on-item my-item">
                                    <div class="on-item-info">
                                        <div class="on-item-photo">
                                            <img src="/storage/images/order-item-1.png" alt="crate">
                                        </div>
                                        <div class="on-item-t">
                                            <div class="on-item-title">{{ __('ID') }} {{ $order->id }}</div>
                                            <div class="on-item-extrainfo">{{ $order->service->name }}</div>
                                        </div>
                                    </div>
                                    <div class="on-item-total">
                                        <div class="on-item-total-b">
                                            <div class="value">{{ __(get_enum_name('order_status', $order->order_status_id)) }}</div>
                                        </div>
                                        <div class="on-item-total__divider"></div>

                                        <div class="on-item-total-b">
                                            <div class="label">{{ __('Amount') }}:</div>
                                            <div class="value _red">{{ $order->invoices()->sum('amount') }} ₪</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{ __('You don\'t have any active orders.') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

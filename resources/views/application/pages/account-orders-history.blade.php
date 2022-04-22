@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active">
                <div class="hist">
                    <div class="on-h">
                        <div class="on-h-title">{{ __('Orders history') }}</div>
                    </div>
                    @if(count($orders))
                        <div class="table__wrapper">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('Service') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Order status') }}</th>
                                        <th class="date">{{ __('Date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td style="white-space: normal">{{ $order->service->name }}</td>
                                            <td class="_red">$ {{ $order->invoices()->sum('amount') }} ₪</td>
                                            <td>{{ __(get_enum_name('order_status', $order->order_status_id)) }}</td>
                                            <td class="_grey date">{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table__wrapper">
                            {{ __('You don\'t have completed orders yet.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

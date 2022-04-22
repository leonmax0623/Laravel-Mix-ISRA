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
                        <div class="on-h-title">{{ __('Payments history') }}</div>
                    </div>
                    <div class="table__wrapper">
                        @if(count($invoices))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Order ID') }}</th>
                                        <th class="_center">{{ __('Payment Type') }}</th>
                                        <th class="_center">{{ __('Amount') }}</th>
                                        <th class="_center">{{ __('Payment Status') }}</th>
                                        <th class="date">{{ __('Date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
                                            <td>{{ $invoice->order_id }}</td>
                                            <td class="_center">{{ __(get_enum_name('payment_type', $invoice->payment_type_id)) }}</td>
                                            <td class="{{ $invoice->status ? '_green' : '_red' }} _center">{{ $invoice->amount }} ₪</td>
                                            <td class="{{ $invoice->status ? '_green' : '_red' }} _center">
                                                {{ $invoice->status ? __('Paid') : __('Unpaid') }}
                                            </td>
                                            <td class="_grey date">{{ date('d.m.Y', strtotime($invoice->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            {{ __('You don\'t have payments for orders yet.') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

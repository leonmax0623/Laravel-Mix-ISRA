@extends('layout.admin')

@section('main')
</div>
    <x-admin.card title="{{ __('Orders') }}">
        <x-slot name="header_tools">
            <a href="{{ route('admin.orders.create') }}" class="btn btn-tool text-success" data-toggle="tooltip" title="{{ __('Create') }}"><i class="fa fas fa-plus"></i></a>
        </x-slot>

        <x-slot name="body" class="p-0">
            <div class="row p-2">
                <div class="col-lg-3">
                    <label for="filter-table-orders-branch-id">{{ __('Branch') }}</label>

                    <select id="filter-table-orders-branch-id" class="form-control" name="filter_branch_id">
                        <option value="" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_branch_id' => NULL])) }}">{{ __('All') }}</option>

                        @foreach(\App\Models\Branch::all() as $branch)
                            <option value="{{ $branch->id }}" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_branch_id' => $branch->id])) }}" {{ request()->get('filter_branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label for="filter-table-orders-order-status-id">{{ __('Status') }}</label>

                    <select id="filter-table-orders-order-status-id" class="form-control" name="filter_order_status_id">
                        <option value="" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_order_status_id' => NULL])) }}">{{ __('All') }}</option>

                        @foreach(config('enum.order_status') as $order_status)
                            <option value="{{ $order_status['id'] }}" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_order_status_id' => $order_status['id']])) }}" {{ request()->get('filter_order_status_id') == $order_status['id'] ? 'selected' : '' }}>{{ __($order_status['name']) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label for="filter-table-orders-payment-status-id">{{ __('Payment Status') }}</label>

                    <select id="filter-table-orders-payment-status-id" class="form-control" name="filter_payment_status_id">
                        <option value="" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_payment_status_id' => NULL])) }}">{{ __('All') }}</option>

                        @foreach(config('enum.payment_status') as $payment_status)
                            <option value="{{ $payment_status['id'] }}" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_payment_status_id' => $payment_status['id']])) }}" {{ request()->get('filter_payment_status_id') == $payment_status['id'] ? 'selected' : '' }}>{{ __($payment_status['name']) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label for="filter-table-orders-client-type-id">{{ __('Client Type') }}</label>

                    <select id="filter-table-orders-client-type-id" class="form-control" name="filter_client_type_id">
                        <option value="" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_client_type_id' => NULL])) }}">{{ __('All') }}</option>

                        @foreach(config('enum.client_type') as $client_type)
                            <option value="{{ $client_type['id'] }}" data-url="{{ route('admin.orders.index', array_merge($filter, ['filter_client_type_id' => $client_type['id']])) }}" {{ request()->get('filter_client_type_id') == $client_type['id'] ? 'selected' : '' }}>{{ __($client_type['name']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table id="table-callbacks" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th style="width: .1%">{{ __('#') }}</th>
                        <th>{{ __('RIVHIT') }}</th>
                        <th>{{ __('Branch') }}</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('Client RIVHIT') }}</th>
                        <th>{{ __('Client Type') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Amount') }} ₪</th>
                        <th>{{ __('Status') }} ₪</th>
                        <th>{{ __('Payment') }}</th>
                        <th>{{ __('Expiry date') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->rivhit }}</td>
                            <td>{{ $order->branch->name }}</td>
                            <td>{{ $order->user->full_name }}</td>
                            <td>{{ $order->user->rivhit }}</td>
                            <td>{{ __(get_enum_name('client_type', $order->user->client_type_id)) }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>{{ $order->invoices->sum('amount') }}</td>
                            <td>{{ __(get_enum_name('order_status', $order->order_status_id)) }}</td>
                            <td>{{ __(get_enum_name('payment_status', $order->payment_status_id)) }}</td>
                            <td>{{ $order->expiry_date }}</td>

                            <td>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" data-toggle="tooltip" title="{{ __('View') }}"><i class="fa fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            {{ $orders->links() }}
        </x-slot>
    </x-admin.card>
@endsection

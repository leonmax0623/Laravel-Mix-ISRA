@extends('layout.admin')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <x-admin.card title="{{ __('Latest orders') }}">
                    <x-slot name="body" class="p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Service') }}</th>
                                    <th>{{ __('Client') }}</th>
                                    <th>{{ __('Amount') }} ₪</th>
                                    <th>{{ __('Status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->service->short_name ?: $service->service->name }}</td>
                                        <td><a href="{{ route('admin.users.edit',  $order->user->id) }}">{{ $order->user->full_name }}</a></td>
                                        <td>{{ $order->invoices()->sum('amount') }}</td>
                                        <td>{{ __(get_enum_name('order_status', $order->order_status_id)) }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.orders.edit', $order->id) }}" data-toggle="tooltip" title="{{ __('View') }}"><i class="fa fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-slot>
                </x-admin.card>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <x-admin.card title="{{ __('Tasks') }}">
                    <x-slot name="body" class="p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Caption') }}</th>
                                    <th>{{ __('Manager') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->date }}</td>
                                        <td>{{ $task->caption }}</td>
                                        <td>
                                            @if($task->manager->exists)
                                                <a href="{{ route('admin.users.edit', $task->manager->id) }}" target="_blank">{{ $task->manager->full_name }}</a>
                                            @else
                                                {{ $task->manager->full_name }}
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.task-manager') }}" data-toggle="tooltip" title="{{ __('Open task manager') }}"><i class="fa fas fa-calendar"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-slot>
                </x-admin.card>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Callbacks') }}">
        <x-slot name="header_tools">
            <a href="{{ route('admin.callbacks.create') }}" class="btn btn-tool text-success" data-toggle="tooltip" title="{{ __('Create') }}"><i class="fa fas fa-plus"></i></a>
        </x-slot>

        <x-slot name="body" class="p-0">
            <div class="row p-2">
                <div class="col-lg-4">
                    <label for="filter-table-callbacks-status">{{ __('Status') }}</label>

                    <select id="filter-table-callbacks-status" class="form-control" name="filter_status">
                        <option value="" data-url="{{ route('admin.callbacks.index', array_merge($filter, ['filter_status' => NULL])) }}">{{ __('All') }}</option>
                        <option value="0" data-url="{{ route('admin.callbacks.index', array_merge($filter, ['filter_status' => 0])) }}" {{ request()->get('filter_status') === '0' ? 'selected' : '' }}>{{ __('New') }}</option>
                        <option value="1" data-url="{{ route('admin.callbacks.index', array_merge($filter, ['filter_status' => 1])) }}" {{ request()->get('filter_status') === '1' ? 'selected' : '' }}>{{ __('In processing') }}</option>
                        <option value="2" data-url="{{ route('admin.callbacks.index', array_merge($filter, ['filter_status' => 2])) }}" {{ request()->get('filter_status') === '2' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                    </select>
                </div>
            </div>

            <table id="table-callbacks" class="table table-sm table-striped">
                <thead>
                <tr>
                    <th style="width: .1%">{{ __('Status') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Client') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Text') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($callbacks_requests as $callbacks_request)
                    <tr>
                        <td class="text-right">
                            @if($callbacks_request->is_new_status)
                                <span class="right badge badge-success">{{ __('New') }}</span>
                            @elseif($callbacks_request->is_processing_status)
                                <span class="right badge badge-primary">{{ __('In processing') }}</span>
                            @elseif($callbacks_request->is_completed_status)
                                <span class="right badge badge-danger">{{ __('Completed') }}</span>
                            @else
                                <span class="right badge badge-secondary">{{ __('Unknown') }}</span>
                            @endif
                        </td>
                        <td>{{ $callbacks_request->created_at }}</td>
                        <td>
                            @if($callbacks_request->user)
                                <a href="{{ route('admin.users.edit', $callbacks_request->user->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ __('The request for a callback was received from a registered user: :name', ['name' => $callbacks_request->user->full_name]) }}"><i class="fa fas fa-user"></i></a>
                            @endif

                            {{ $callbacks_request->name }}
                        </td>
                        <td>{{ $callbacks_request->phone }}</td>
                        <td>{{ $callbacks_request->email }}</td>
                        <td>{{ \Illuminate\Support\Str::of($callbacks_request->text)->limit(64) }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.callbacks.edit', $callbacks_request->id) }}" data-toggle="tooltip" title="{{ __('View') }}"><i class="fa fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            {{ $callbacks_requests->links() }}
        </x-slot>
    </x-admin.card>
@endsection

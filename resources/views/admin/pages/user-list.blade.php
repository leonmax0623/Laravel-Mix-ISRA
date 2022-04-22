@extends('layout.admin')

@section('main')
    <div class="container-fluid  mb-2 p-0">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    <x-admin.card title="{{ __('List of users') }}">
        <x-slot name="body" class="p-0">
            <div class="row p-2">
{{--                <div class="col-lg-4">--}}
{{--                    <label>{{ __('Service') }}</label>--}}
{{--                    <select id="filter-table-orders-service" class="form-control">--}}
{{--                        <option value="">{{ __('All') }}</option>--}}
{{--                        @foreach(\App\Models\Service::all() as $service)--}}
{{--                            <option value="{{ $service->id }}">{{ $service->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4"></div>--}}
{{--                <div class="col-lg-4"></div>--}}
            </div>

            <table id="table-users" class="table table-sm data-table" style="width: 100%;">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{ __('№') }}</th>
                    <th>{{ __('Full name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Registration Date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </x-slot>
    </x-admin.card>
@endsection

@push('scripts')
    <script>
        $(function () {
            let dataTableUsers = $('#table-users').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                lengthChange: false,
                searching: true,
                ordering:  false,
                dom: '<"top"f>rt<"bottom" ip>',

                ajax: {
                    url: '{{ route('admin.users.list') }}'
                },

                columns: [
                    {
                        data: null,
                        name: 'first_name',
                        visible: false,
                    },
                    {
                        data: null,
                        name: 'last_name',
                        visible: false,
                    },
                    {
                        data: 'id',
                        name: 'id',
                        width: '.1%'
                    },
                    {
                        data: null,
                        name: 'full_name',
                        orderable: false,
                        searchable: false,

                        render: function(data) {
                            return data['first_name'] + ' ' + data['last_name'];
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: false
                    },
                    {
                        data: null,
                        name: 'created_at',
                        orderable: false,
                        searchbale: false,

                        render: function (data) {
                            return moment(data['created_at']).format('L');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });
        });
    </script>
@endpush

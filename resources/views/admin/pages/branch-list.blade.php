@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Branches') }}">
        <x-slot name="header_tools">
            <a href="{{ route('admin.branches.create') }}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
        </x-slot>

        <x-slot name="body" class="p-0">
            <table id="table-callbacks" class="table table-sm data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Address') }}</th>
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
            let dataTableCallbacks = $('#table-callbacks').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                lengthChange: false,
                searching: true,
                ordering:  false,
                dom: '<"top">rt<"bottom" p>',

                ajax: {
                    url: '{{ route('admin.branches.index') }}'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name', render: (value) => value['{{ app()->getLocale() }}']},
                    {data: 'address', name: 'address', render: (value) => value['{{ app()->getLocale() }}']},
                    {data: 'url_edit', name: 'url_edit', className: "text-right", render: (url) => '<a href="' + url +'" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>'}
                ]
            });
        });
    </script>
@endpush

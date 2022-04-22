@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Web Pages') }}">
        <x-slot name="header_tools">
            <a href="{{ route('admin.web-pages.create') }}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
        </x-slot>

        <x-slot name="body" class="p-0">
            <table id="table-web-pages" class="table table-sm data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('SEO URL') }}</th>
                        <th></th>
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
            $('#table-web-pages').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                lengthChange: false,
                searching: true,
                ordering:  false,
                dom: '<"top">rt<"bottom" p>',

                ajax: {
                    url: '{{ route('admin.web-pages.index') }}'
                },
                columns: [
                    {data: 'id', name: 'id', width: '.1%'},
                    {data: 'title', name: 'title', render: (value) => value['{{ app()->getLocale() }}']},
                    {data: 'slug', name: 'slug', render: (value) => ('/' + value)},
                    {data: 'url_edit', name: 'url_edit', className: "text-right", width: '.1%', render: (url) => '<a href="' + url +'" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>'},
                    {data: 'url_view', name: 'url_view', className: "text-right", width: '.1%', render: (url) => '<a href="' + url +'" class="btn btn-sm btn-primary" target="_blank">{{ __('View') }}</a>'},
                ]
            });
        });
    </script>
@endpush

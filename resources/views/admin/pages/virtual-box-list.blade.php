@extends('layout.admin')

@section('main')
    <div class="container-fluid mb-2 p-0">
        <a href="{{ route('admin.virtual-box.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    <x-admin.card title="{{ __('List of virtual boxes') }}">
        <table id="table-virtual-boxes" class="table data-table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
            <tbody></tbody>
        </table>
    </x-admin.card>
@endsection

@push('scripts')
    <script>
        $(function () {
            var table = $('#table-virtual-boxes').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                responsive: true,
                lengthChange: false,
                searching: false,
                ajax: "{{ route('admin.virtual-box.list') }}",
                columns: [
                    {data: 'id', name: 'id', width: '0.1%'},
                    {data: 'name', name: 'name'},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false, width: '0.1%'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '0.1%'},
                ]
            });
        });
    </script>
@endpush

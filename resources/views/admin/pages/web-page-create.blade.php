@extends('layout.admin')

@section('main')
    <form id="form-web-page-create" action="{{ route('admin.web-pages.store') }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Create Web Page') }}">
            <x-admin.forms.web-page :wp="new \App\Models\WebPage()"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

@push('scripts')
    <script>
        $('#form-web-page-create').formSubmitter({
            success: function() {
                location.href = '{{ route('admin.web-pages.index') }}';
            }
        });
    </script>
@endpush

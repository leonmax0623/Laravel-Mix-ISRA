@extends('layout.admin')

@section('main')
    <form id="form-web-page-edit" action="{{ route('admin.web-pages.update', $web_page->id) }}" method="post">
        @csrf

        {{ method_field('PATCH') }}

        <x-admin.card title="{{ __('Edit Web Page') }}">
            <x-admin.forms.web-page :wp="$web_page"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Edit') }}</button>
                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')" form="form-destroy">{{ __('Remove') }}</button>
            </x-slot>
        </x-admin.card>
    </form>

    <form id="form-destroy" action="{{ route('admin.web-pages.destroy', $web_page->id) }}" method="post">
        @csrf

        {{ method_field('DELETE') }}
    </form>
@endsection

@push('scripts')
    <script>
        $('#form-web-page-edit').formSubmitter({
            success: function(response) {
                location.reload();
            }
        });
    </script>
@endpush

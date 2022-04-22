@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Callbacks') }}">
        <x-slot name="header_tools">
            <button type="submit" class="btn btn-tool text-success" form="form-callback-request-create" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
        </x-slot>

        <x-admin.form.callback-request id="form-callback-request-create" action="{{ route('admin.callbacks.store') }}" method="post" :callback-request="new \App\Models\CallbackRequest()"/>
    </x-admin.card>
@endsection

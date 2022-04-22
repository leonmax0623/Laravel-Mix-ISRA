@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Callbacks') }}">
        <x-slot name="header_tools">
            <button type="submit" class="btn btn-tool text-success" form="form-callback-request-edit" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
            <button type="submit" class="btn btn-tool text-danger" form="form-callback-request-delete" data-toggle="tooltip" title="{{ __('Remove') }}"><i class="fa fas fa-trash"></i></button>
            <form id="form-callback-request-delete" class="d-none" action="{{ route('admin.callbacks.destroy', $callback_request->id) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </x-slot>

        <x-admin.form.callback-request id="form-callback-request-edit" action="{{ route('admin.callbacks.update', $callback_request->id) }}" method="put" :callback-request="$callback_request"/>
    </x-admin.card>
@endsection

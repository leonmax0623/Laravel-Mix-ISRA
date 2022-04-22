@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.services.edit.request', ['id' => $service->id]) }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Edit service') }}">
            <x-admin.forms.service :service="$service"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

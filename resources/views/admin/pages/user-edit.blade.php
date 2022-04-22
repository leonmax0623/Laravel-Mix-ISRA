@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.users.edit.request', ['id' => $user->id]) }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Edit user') }}">
            <x-slot name="header_tools">
                <button type="submit" class="btn btn-tool text-success" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
                <a target="_blank" href="{{ route('admin.users.authorize-as', $user->id) }}" class="btn btn-sm btn-warning">{{ __('Authorize as customer') }}</a>
            </x-slot>

            <x-admin.forms.user :user="$user"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

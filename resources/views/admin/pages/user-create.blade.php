@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.users.create.request') }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Create user') }}">
            <x-admin.forms.user />

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

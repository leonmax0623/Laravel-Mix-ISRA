@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.branches.store') }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Create branch') }}">
            <x-admin.forms.branch :branch="new \App\Models\Branch()"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

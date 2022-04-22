@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.virtual-box.create.request') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.card title="{{ __('Create virtual box') }}">
            <x-admin.forms.virtual-box action="create" :box="new \App\Models\VirtualBox()"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

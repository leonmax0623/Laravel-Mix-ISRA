@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.virtual-box.edit.request', ['id' => $virtual_box->id]) }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.card title="{{ __('Edit virtual box') }}">
            <x-admin.forms.virtual-box action="edit" :box="$virtual_box"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Edit') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

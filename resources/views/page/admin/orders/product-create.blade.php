@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.order.products.create.request') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.card title="{{ __('Create product') }}">
            <x-admin.order.product/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

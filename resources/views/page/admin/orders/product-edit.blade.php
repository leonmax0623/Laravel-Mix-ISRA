@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.order.products.edit.request', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.card title="{{ __('Edit product') }}">
            <x-admin.order.product :product="$product"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </x-slot>
        </x-admin.card>
    </form>
@endsection

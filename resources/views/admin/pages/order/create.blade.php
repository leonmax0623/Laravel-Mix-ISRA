@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Orders') }}">
        <x-slot name="header_tools">
            <button type="submit" class="btn btn-tool text-success" form="form-order-create" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
        </x-slot>

        <x-admin.form.order id="form-order-create" action="{{ route('admin.orders.store') }}" method="post" :order="new \App\Models\Order()"/>
    </x-admin.card>
@endsection

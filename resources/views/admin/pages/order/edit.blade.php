@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Order') }}">
        <x-slot name="header_tools">
            <button type="submit" class="btn btn-tool text-success" form="form-order-edit" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
            <button type="submit" class="btn btn-tool text-danger" form="form-order-delete" data-toggle="tooltip" title="{{ __('Remove') }}"><i class="fa fas fa-trash"></i></button>

            <form id="form-order-delete" class="d-none" action="{{ route('admin.orders.destroy', $order->id) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </x-slot>

        <x-admin.form.order id="form-order-edit" action="{{ route('admin.orders.update', $order->id) }}" method="put" :order="$order"/>
    </x-admin.card>
@endsection

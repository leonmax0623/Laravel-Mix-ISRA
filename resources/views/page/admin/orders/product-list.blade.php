@extends('layout.admin')

@section('main')
    <div class="container-fluid mb-2 p-0">
        <a href="{{ route('admin.order.products.create') }}" class="btn btn-success">{{ __('Create') }}</a>
    </div>

    <x-admin.card title="{{ __('List of products') }}">
        <x-admin.table>
            <x-slot name="head">
                <th>{{ __('Name') }}</th>
                <th style="width: 10px"></th>
            </x-slot>

            <x-slot name="body">
                @foreach($products as $product)
                    <tr>
                        <td class="text-nowrap">{{ $product->title }}</td>
                        <td class="text-nowrap" style="width: .1%">
                            <a class="btn btn-primary" href="{{ route('admin.order.products.edit', ['id' => $product->id]) }}">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.table>
    </x-admin.card>
@endsection

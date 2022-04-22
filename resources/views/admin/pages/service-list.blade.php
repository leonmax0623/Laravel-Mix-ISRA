@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Services') }}">
        <x-admin.table>
            <x-slot name="head">
                <th>{{ __('Name') }}</th>
                <th style="width: 10px"></th>
            </x-slot>

            <x-slot name="body">
                @foreach($services as $service)
                    <tr>
                        <td class="text-nowrap">{{ $service->name }}</td>
                        <td class="text-nowrap" style="width: .1%">
                            <a class="btn btn-primary" href="{{ route('admin.services.edit', ['id' => $service->id]) }}">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.table>
    </x-admin.card>
@endsection

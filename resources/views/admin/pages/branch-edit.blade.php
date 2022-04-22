@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.branches.update', $branch->id) }}" method="post">
        @csrf

        {{ method_field('PATCH') }}

        <x-admin.card title="{{ __('Edit branch') }}">
            <x-admin.forms.branch :branch="$branch"/>

            <x-slot name="footer">
                <button type="submit" class="btn btn-success">{{ __('Edit') }}</button>
                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')" form="form-destroy">{{ __('Remove') }}</button>
            </x-slot>
        </x-admin.card>
    </form>

    <form id="form-destroy" action="{{ route('admin.branches.destroy', $branch->id) }}" method="post">
        @csrf

        {{ method_field('DELETE') }}
    </form>
@endsection

@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Prices') }}">
        <x-slot name="header_tools">
            <button class="btn btn-tool text-success" type="submit" form="form-prices" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
        </x-slot>

        <form id="form-prices" action="{{ route('admin.prices') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-lg-3">
                    <x-admin.card title="{{ __('Boxes') }}">
                        <div class="form-group">
                            <label>{{ __('The cost of a storage box') }}</label>
                            <input type="text" class="form-control form-control-sm" name="price_box_storage" value="{{ settings()->get('price_box_storage') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ __('The cost of the box for rent') }}</label>
                            <input type="text" class="form-control form-control-sm" name="price_box_rent" value="{{ settings()->get('price_box_rent') }}">
                        </div>
                    </x-admin.card>
                </div>
                <div class="col-lg-3">
                    <x-admin.card title="{{ __('Bulky Items') }}">
                        <div class="form-group">
                            <label>{{ __('The cost of storing a bulky item') }}</label>
                            <input type="text" class="form-control form-control-sm" name="price_bulky_item_storage" value="{{ settings()->get('price_bulky_item_storage') }}">
                        </div>
                    </x-admin.card>
                </div>
                <div class="col-lg-3">
                    <x-admin.card title="{{ __('Pallets') }}">
                        <div class="form-group">
                            <label>{{ __('The cost of storage on a pallet') }}</label>
                            <input type="text" class="form-control form-control-sm" name="price_pallet_storage" value="{{ settings()->get('price_pallet_storage') }}">
                        </div>

                        <div class="form-group">
                            <label>{{ __('The cost of storing 1m³') }}</label>
                            <input type="text" class="form-control form-control-sm" name="price_pallet_cubic_meter_storage" value="{{ settings()->get('price_pallet_cubic_meter_storage') }}">
                        </div>
                    </x-admin.card>
                </div>
                <div class="col-lg-3">
                    <x-admin.card title="{{ __('Delivery') }}">

                    </x-admin.card>
                </div>
            </div>
        </form>
    </x-admin.card>
@endsection

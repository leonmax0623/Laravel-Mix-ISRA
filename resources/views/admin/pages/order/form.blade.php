<form id="{{ $attributes->get('id') }}" action="{{ $attributes->get('action') }}" method="post">
    @csrf
    @method($attributes->get('method'))

    <x-admin.card title="{{ __('Order info') }} №{{ $order->id }}">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Service') }}</label>
                    <select class="form-control form-control-sm" name="service_id">
                        @foreach(\App\Models\Service::all() as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id || ($order->exists && $order->service->is($service)) ? 'selected' : '' }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Branch') }}</label>
                    <select class="form-control form-control-sm" name="branch_id">
                        @foreach(\App\Models\Branch::all() as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id || ($order->exists && $order->branch->is($branch)) ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Order status') }}</label>
                    <select class="form-control form-control-sm" name="order_status_id">
                        @foreach(config('enum.order_status') as $order_status)
                            <option value="{{ $order_status['id'] }}" {{ old('order_status_id') == $order_status['id'] || ($order->exists && $order->order_status_id == $order_status['id']) ? 'selected' : '' }}>{{ __($order_status['name']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Payment status') }}</label>
                    <select class="form-control form-control-sm" name="payment_status_id">
                        @foreach(config('enum.payment_status') as $payment_status)
                            <option value="{{ $payment_status['id'] }}" {{ old('payment_status_id') == $payment_status['id'] || ($order->exists && $order->payment_status_id == $payment_status['id']) ? 'selected' : '' }}>{{ __($payment_status['name']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Payment type') }}</label>
                    <select class="form-control form-control-sm" name="payment_type_id">
                        @foreach(config('enum.payment_type') as $payment_type)
                            <option value="{{ $payment_type['id'] }}" {{ old('payment_type_id') == $payment_type['id'] || ($order->exists && $order->payment_type_id == $payment_type['id']) ? 'selected' : '' }}>{{ __($payment_type['name']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>RIVHIT</label>
                    <input type="text" class="form-control form-control-sm" name="rivhit" value="{{ $order->rivhit }}">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Location') }}</label>
                    <input type="text" class="form-control form-control-sm" name="location" value="{{ $order->location }}">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Delivery date') }}</label>
                    <input type="text" class="form-control form-control-sm datetimepicker-input" name="delivery_datetime" data-toggle="datetimepicker" value="{{ $order->exists ? date('d.m.Y H:i', strtotime($order->delivery_datetime)) : '' }}">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('Collection date') }}</label>
                    <input type="text" class="form-control form-control-sm datetimepicker-input" name="pickup_datetime" data-toggle="datetimepicker" value="{{ $order->exists ? date('d.m.Y H:i', strtotime($order->pickup_datetime)) : '' }}">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label>{{ __('End of term') }}</label>
                    <input type="text" class="form-control form-control-sm datepicker-input" name="expiry_date" data-toggle="datetimepicker" value="{{ $order->exists ? date('d.m.Y', strtotime($order->expiry_date)) : '' }}">
                </div>
            </div>
        </div>
    </x-admin.card>

    @if($order->exists)
        <div class="row">
            <div class="col-12">
                <x-admin.card id="card-order-invoices" title="{{ __('Invoices') }} ({{ $order->invoices()->count() }}) / {{ __('Total') }}: {{ $order->invoices()->sum('amount') }} ₪" is-collapse="{{ request()->route()->named('admin.order.create') ? 'true' : 'false' }}">
                    <x-slot name="body" class="p-0">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Number') }}</th>
                                    <th>{{ __('Payment Type') }}</th>
                                    <th>{{ __('Amount') }} ₪</th>
                                    <th>{{ __('Comment') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th>{{ __('Expiry') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->invoices()->orderBy('id', 'desc')->get() as $invoice)
                                    <tr id="invoice-{{ $invoice->id }}">
                                        <td class="payment_date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $invoice->payment_date)->format('d.m.Y') }}</td>
                                        <td class="number">{{ $invoice->number }}</td>
                                        <td class="payment_type">{{ __(get_enum_name('payment_type', $invoice->payment_type_id)) }}</td>
                                        <td class="amount">{{ $invoice->amount }}</td>
                                        <td class="comment">{{ $invoice->comment }}</td>
                                        <td class="text-center">
                                            <div class="icheck-success d-inline">
                                                <input class="payment_status" type="checkbox" id="checkbox-payment-status-{{ $invoice->id }}" data-action="change-invoice-status" data-invoice-id="{{ $invoice->id }}" {{ $invoice->status ? 'checked' : '' }}>
                                                <label for="checkbox-payment-status-{{ $invoice->id }}"></label>
                                            </div>
                                        </td>
                                        <td class="expiry_date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $invoice->expiry_date)->format('d.m.Y') }}</td>
                                        <td class="text-right">
                                            <button class="btn btn-primary btn-sm" data-action="edit-invoice" data-toggle="modal" data-invoice-id="{{ $invoice->id }}" data-target="#modal-invoice-edit" onclick="return false;">{{ __('Edit') }}</button>
                                            <button class="btn btn-danger btn-sm" data-action="delete-invoice" data-invoice-id="{{ $invoice->id }}">{{ __('Remove') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-right">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-invoice-create" onclick="return false;">{{ __('Add') }}</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </x-slot>
                </x-admin.card>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <x-admin.card title="{{ __('Client info') }}" is-collapse="{{ !$order->exists ? 'true' : 'false' }}">
                        @if($order->exists)
                            <x-slot name="header_tools">
                                <a href="{{ route('admin.users.edit', $order->user->id) }}" target="_blank">{{ __('Client profile') }}</a>
                            </x-slot>
                        @endif

                        <div class="row">
                            @if($order->exists)
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Client') }}</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $order->user->full_name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $order->user->email }}" disabled>
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                            @else
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Client') }}</label>

                                        <div class="select2-purple">
                                            <select class="select2 form-control" name="user_id" data-placeholder="{{ __('Choose a client') }}" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach(\App\Models\User::all() as $user)
                                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->full_name }} ({{ $user->email }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Number") }} #1</label>
                                    <input type="text" class="form-control form-control-sm" name="phone_1" value="{{ old('phone_1') ?? $order->phone_1 }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Number") }} #2</label>
                                    <input type="text" class="form-control form-control-sm" name="phone_2" value="{{ old('phone_2') ?? $order->phone_2 }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __("Comment") }}</label>
                                    <textarea class="form-control form-control-sm" name="comment" rows="5">{{ old('comment') ?? $order->comment }}</textarea>
                                </div>
                            </div>
                        </div>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Address info') }}" is-collapse="{{ !$order->exists ? 'true' : 'false' }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Index") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="address_index" value="{{ old('address_index') ?? $order->address_index }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("City") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="address_city" value="{{ old('address_city') ?? $order->address_city }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Street") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="address_street" value="{{ old('address_street') ?? $order->address_street }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("House") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="address_house" value="{{ old('address_house') ?? $order->address_house }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Room") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="entrance_apartment" value="{{ old('entrance_apartment') ?? $order->entrance_apartment }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Floor") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="entrance_floor" value="{{ old('entrance_floor') ?? $order->entrance_floor }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Intercom code") }}</label>
                                    <input type="text" class="form-control form-control-sm" name="entrance_code" value="{{ old('entrance_code') ?? $order->entrance_code }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __("Elevator at the entrance") }}</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="entrance_elevator" value="1" {{ old('entrance_elevator') ?? $order->entrance_elevator ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ __("There is") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-admin.card>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <x-admin.card title="{{ __('Plastic boxes') }} ({{ $order->boxes()->count() }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body" class="p-0">
                            <table id="table-virtual-boxes" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Virtual Box') }}</th>
                                    <th>{{ __('Comment') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Rent') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->exists)
                                    @foreach($order->boxes as $i => $box)
                                        <tr>
                                            <td>
                                                <select class="form-control" name="box[{{ $box->id }}][virtual_box_id]">
                                                    <option value="">-- {{ __('Not selected') }} --</option>

                                                    @foreach($virtual_boxes_free as $virtual_box)
                                                        <option value="{{ $virtual_box->id }}" {{ $box->virtualBox?->is($virtual_box) ? 'selected' : '' }}>{{ $virtual_box->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input class="form-control" name="box[{{ $box->id }}][comment]" value="{{ $box->comment }}"></td>
                                            <td><x-admin.form.input.image name="box[{{ $box->id }}][image]" value="{{ $box->image?->file }}"/></td>
                                            <td class="text-center"><input type="checkbox" name="box[{{ $box->id }}][rent]" value="1" {{ $box->is_rent ? 'checked' : '' }}></td>
                                            <td class="text-right"><button class="btn btn-danger" data-action="remove-box">{{ __('Remove') }}</button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <select class="form-control" id="box-mass" name="box_mass[]" multiple>
                                                    <option value="">-- {{ __('Not selected') }} --</option>

                                                    @foreach($virtual_boxes_free as $virtual_box)
                                                        <option value="{{ $virtual_box->id }}">{{ $virtual_box->name }}</option>
                                                    @endforeach
                                        </select>
                                    </td>
                                    <td colspan="3" class="text-right">
                                        <button class="btn btn-primary btn-sm" data-action="add-box-mass">{{ __('Mass add') }}</button>
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <button class="btn btn-primary btn-sm" data-action="add-box">{{ __('Add') }}</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </x-slot>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Dimensional items') }} ({{ $order->bulkyItems()->count() }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body" class="p-0">
                            <table id="table-bulky-items" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Comment') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->exists)
                                    @foreach($order->bulkyItems as $bulky_item)
                                        <tr>
                                            <td><input class="form-control" name="bulky_item[{{ $bulky_item->id }}][comment]" value="{{ $bulky_item->comment }}"></td>
                                            <td><x-admin.form.input.image name="bulky_item[{{ $bulky_item->id }}][image]" value="{{ $bulky_item->image?->file }}"/></td>
                                            <td class="text-right"><button class="btn btn-danger" data-action="remove-bulky-item">{{ __('Remove') }}</button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <button class="btn btn-primary btn-sm" data-action="add-bulky-item">{{ __('Add') }}</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </x-slot>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Pallets') }} ({{ $order->pallets()->count() }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body" class="p-0">
                            <table id="table-pallets" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Comment') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($order->exists)
                                        @foreach($order->pallets as $pallet)
                                            <tr>
                                                <td><input class="form-control" name="pallet[{{ $pallet->id }}][comment]" value="{{ $pallet->comment }}"></td>
                                                <td><x-admin.form.input.image name="pallet[{{ $pallet->id }}][image]" value="{{ $pallet->image?->file }}"/></td>
                                                <td class="text-right"><button class="btn btn-danger" data-action="remove-pallet">{{ __('Remove') }}</button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <button class="btn btn-primary btn-sm" data-action="add-pallet">{{ __('Add') }}</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </x-slot>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Products') }} ({{ $order->products()->count() }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body" class="p-0">
                            <table id="table-products" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Product') }}</th>
                                    <th>{{ __('Count') }}</th>
                                    <th>{{ __('Unit price') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->exists)
                                    @foreach($order->products()->withPivot(['price', 'count'])->get() as $i => $product)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.order.products.edit', ['id' => $product->id]) }}" target="_blank">{{ $product->title }}</a>
                                                <input type="hidden" name="product[{{ $product->id }}][id]" value="{{ $product->id }}">
                                            </td>
                                            <td><input type="number" class="form-control" name="product[{{ $product->id }}][count]" value="{{ $product->pivot->count }}"></td>
                                            <td>{{ $product->pivot->price }}₪</td>
                                            <td class="text-right"><button class="btn btn-danger" data-action="remove-product">{{ __('Remove') }}</button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <button class="btn btn-primary btn-sm" data-action="add-product">{{ __('Add') }}</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </x-slot>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Images') }} ({{ $order->images()->count() }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body" class="p-0">
                            <table id="table-images" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Comment') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->exists)
                                    @foreach($order->images as $image)
                                        <tr>
                                            <td><input class="form-control" name="image[{{ $image->id }}][comment]" value="{{ $image->comment }}"></td>
                                            <td><x-admin.form.input.image name="image[{{ $image->id }}][image]" value="{{ $image->image?->file }}"/></td>
                                            <td class="text-right"><button class="btn btn-danger" data-action="remove-image">{{ __('Remove') }}</button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <button class="btn btn-primary btn-sm" data-action="add-image">{{ __('Add') }}</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </x-slot>
                    </x-admin.card>
                </div>

                <div class="col-12">
                    <x-admin.card title="{{ __('Volume') }} ({{ $order->exists ? $order->volume : 0 }} {{ __('m³') }})" is-collapse="{{ $order->exists ? 'true' : 'false' }}">
                        <x-slot name="body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="volume" value="{{ $order->volume }}">
                            </div>
                        </x-slot>
                    </x-admin.card>
                </div>
            </div>
        </div>
    </div>

    @if($order->exists)
        @push('modals')
            <x-admin.widget.modal id="modal-invoice-create">
                <x-slot name="header">
                    {{ __('Invoice creation') }}
                </x-slot>

                <x-slot name="body">
                    <form id="form-invoice-create" action="{{ route('admin.invoice.create') }}" method="post">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Date') }}</label>
                                    <input type="text" class="form-control form-control-sm datepicker-input" data-toggle="datetimepicker" name="payment_date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Number') }}</label>
                                    <input type="text" class="form-control form-control-sm" name="number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Payment type') }}</label>
                                    <select class="form-control form-control-sm" name="payment_type_id">
                                        @foreach(config('enum.payment_type') as $payment_type)
                                            <option value="{{ $payment_type['id'] }}">{{ $payment_type['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Сумма</label>
                                    <input type="text" class="form-control form-control-sm" name="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select class="form-control form-control-sm" name="status">
                                        <option value="0">{{ __('Not paid') }}</option>
                                        <option value="1">{{ __('Paid') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Term') }}</label>
                                    <input type="text" class="form-control form-control-sm datepicker-input" name="expiry_date" data-toggle="datetimepicker">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Comment') }}</label>
                            <textarea class="form-control form-control-sm" name="comment" rows="4"></textarea>
                        </div>
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="form-invoice-create">{{ __('button.create') }}</button>
                </x-slot>
            </x-admin.widget.modal>
        @endpush

        @push('modals')
            <x-admin.widget.modal id="modal-invoice-edit">
                <x-slot name="header">
                    {{ __('Account editing') }} 
                </x-slot>

                <x-slot name="body">
                    <form id="form-invoice-edit" action="{{ route('admin.invoice.edit') }}" method="post">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input id="invoice_id" type="text" name="invoice_id" value="" style="display: none">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Date') }}</label>
                                    <input type="text" class="form-control form-control-sm datepicker-input" data-toggle="datetimepicker" name="payment_date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Номер</label>
                                    <input type="text" class="form-control form-control-sm" name="number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Payment type') }}</label>
                                    <select class="form-control form-control-sm" name="payment_type_id">
                                        @foreach(config('enum.payment_type') as $payment_type)
                                            <option value="{{ $payment_type['id'] }}">{{ $payment_type['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Sum') }}</label>
                                    <input type="text" class="form-control form-control-sm" name="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select class="form-control form-control-sm" name="status">
                                        <option value="0">{{ __('Not paid') }}</option>
                                        <option value="1">{{ __('Paid') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Term') }}</label>
                                    <input type="text" class="form-control form-control-sm datepicker-input" name="expiry_date" data-toggle="datetimepicker">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Comment') }}</label>
                            <textarea class="form-control form-control-sm" name="comment" rows="4"></textarea>
                        </div>
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="form-invoice-edit">{{ __('button.edit') }}</button>
                </x-slot>
            </x-admin.widget.modal>
        @endpush

        @push('scripts')
            <script>
                $('#form-invoice-create').formSubmitter({
                    success: function(invoice_id) {
                        $('#modal-invoice-create').modal('hide');
                        $('#form-invoice-create').get(0).reset();
                        $('#card-order-invoices').load(location.href + ' #card-order-invoices > *', function() {
                            $(this).find('.collapse').collapse('show')
                        });
                    }
                });

                $('#form-invoice-edit').formSubmitter({
                    success: function(invoice_id) {
                        $('#modal-invoice-edit').modal('hide');
                        $('#form-invoice-edit').get(0).reset();
                        $('#card-order-invoices').load(location.href + ' #card-order-invoices > *', function() {
                            $(this).find('.collapse').collapse('show')
                        });
                    }
                });

                $(document).on('change', '[data-action="change-invoice-status"]', function(event) {
                    let _this = $(this);

                    let status = $(this).prop('checked') + 0;

                    _this.attr('disabled', 'disabled');

                    $.post('{{ route('admin.invoice.status') }}', {
                        invoice_id: $(this).attr('data-invoice-id'),
                        status: status
                    }).fail(function() {
                        _this.prop('checked', !_this.prop('checked'));
                    }).always(function() {
                        _this.removeAttr('disabled');
                    });
                });

                $(document).on('click', '[data-action="edit-invoice"]', function(event) {
                    event.preventDefault();

                    let _this = $(this);

                    _this.attr('disabled', 'disabled');

                    // назначаем id инвойса скрытому полю
                    let invoice_id = $(this).attr('data-invoice-id');
                    $("#invoice_id").val(invoice_id);
                    $('#form-invoice-edit input[name=payment_date]').val($("#invoice-"+invoice_id+" .payment_date").text());
                    $('#form-invoice-edit input[name=number]').val($("#invoice-"+invoice_id+" .number").text());
                    $('#form-invoice-edit select[name=payment_type_id]').val($('#form-invoice-edit select[name=payment_type_id] option:contains("'+ $("#invoice-"+invoice_id+" .payment_type").text() +'")').val());
                    $('#form-invoice-edit input[name=amount]').val($("#invoice-"+invoice_id+" .amount").text());
                    $('#form-invoice-edit textarea[name=comment]').val($("#invoice-"+invoice_id+" .comment").text());
                    $('#form-invoice-edit input[name=expiry_date]').val($("#invoice-"+invoice_id+" .expiry_date").text());
                    
                    if($("#checkbox-payment-status-"+invoice_id).is(':checked')) {
                        $('#form-invoice-edit select[name=status] option[value=1]').prop('selected', true);
                    }
                    else {
                        $('#form-invoice-edit select[name=status] option[value=1]').prop('selected', true);
                    }
                    
                    
                    $.post('{{ route('admin.invoice.edit') }}', {
                    }).done(function() {
                        $('#card-order-invoices').load(location.href + ' #card-order-invoices > *', function() {
                            $(this).find('.collapse').collapse('show')
                        });
                    }).always(function() {
                        _this.removeAttr('disabled');
                    });
                });

                $(document).on('click', '[data-action="delete-invoice"]', function(event) {
                    event.preventDefault();

                    let _this = $(this);

                    _this.attr('disabled', 'disabled');

                    $.post('{{ route('admin.invoice.delete') }}', {
                        invoice_id: $(this).attr('data-invoice-id')
                    }).done(function() {
                        $('#card-order-invoices').load(location.href + ' #card-order-invoices > *', function() {
                            $(this).find('.collapse').collapse('show')
                        });
                    }).always(function() {
                        _this.removeAttr('disabled');
                    });
                });
            </script>
        @endpush
    @endif
</form>

@push('scripts')
    <script>
        let pallets_count = 0;
        let bulky_items_count = 0;
        let boxes_count = 0;
        let products_count = 0
        let images_count = 0

        $(document).on('click', '[data-action="add-pallet"]', function(event) {
            event.preventDefault();

            let $button = $(this);
            let $table = $button.closest('table');

            pallets_count -= 1;

            $table.find('tbody').append(`
                <tr>
                    <td><input class="form-control" name="pallet[` + pallets_count + `][comment]"></td>
                    <td><x-admin.form.input.image name="pallet[` + pallets_count + `][image]"/></td>
                    <td class="text-right"><button class="btn btn-danger" data-action="remove-pallet">{{ __('Remove') }}</button></td>
                </tr>
            `)
        });

        $(document).on('click', '[data-action="add-bulky-item"]', function(event) {
            event.preventDefault();

            let $button = $(this);
            let $table = $button.closest('table');

            bulky_items_count -= 1;

            $table.find('tbody').append(`
                <tr>
                    <td><input class="form-control" name="bulky_item[` + bulky_items_count + `][comment]"></td>
                    <td><x-admin.form.input.image name="bulky_item[` + bulky_items_count + `][image]"/></td>
                    <td class="text-right"><button class="btn btn-danger" data-action="remove-bulky-item">{{ __('Remove') }}</button></td>
                </tr>
            `)
        });

        $(document).on('click', '[data-action="add-image"]', function(event) {
            event.preventDefault();

            let $button = $(this);
            let $table = $button.closest('table');

            images_count -= 1;

            $table.find('tbody').append(`
                <tr>
                    <td><input class="form-control" name="image[` + images_count + `][comment]"></td>
                    <td><x-admin.form.input.image name="image[` + images_count + `][image]"/></td>
                    <td class="text-right"><button class="btn btn-danger" data-action="remove-image">{{ __('Remove') }}</button></td>
                </tr>
            `)
        });

        $(document).on('click', '[data-action="add-box-mass"]', function(event) {
            event.preventDefault();
            var selectednumbers = [];
            console.log('watafak')
                $('#box-mass :selected').each(function(i, selected) {
                    id =  $(selected).val();
                    console.log(id);
                    let $button = $(this);
                    let $table = $button.closest('table');

                    boxes_count -= 1;

                    $table.find('tbody').append(`
                        <tr>
                            <td><select class="form-control" name="box[` + boxes_count + `][virtual_box_id]"></select></td>
                            <td><input class="form-control" name="box[` + boxes_count + `][comment]"></td>
                            <td><x-admin.form.input.image name="box[` + boxes_count + `][image]"/></td>
                            <td class="text-center"><input type="checkbox" name="box[` + boxes_count + `][rent]"></td>
                            <td class="text-right"><button class="btn btn-danger" data-action="remove-box">{{ __('Remove') }}</button></td>
                        </tr>
                    `);

                    $(document).find(`[name="box[` + boxes_count + `][virtual_box_id]"]`).append($('<option>', {
                        value: '',
                        text: '-- {{ __('Not selected') }} --'
                    }));

                    @foreach($virtual_boxes_free as $virtual_box)
                    selected = id == {{$virtual_box->id}} ? 'selected' : '';
                    $(document).find(`[name="box[` + boxes_count + `][virtual_box_id]"]`).append($('<option '+selected+' value="{{$virtual_box->id}}">{{ $virtual_box->name }}</option>'));
                    @endforeach
                });
        });

        $(document).on('click', '[data-action="add-box"]', function(event) {
            event.preventDefault();

            let $button = $(this);
            let $table = $button.closest('table');

            boxes_count -= 1;

            $table.find('tbody').append(`
                <tr>
                    <td><select class="form-control" name="box[` + boxes_count + `][virtual_box_id]"></select></td>
                    <td><input class="form-control" name="box[` + boxes_count + `][comment]"></td>
                    <td><x-admin.form.input.image name="box[` + boxes_count + `][image]"/></td>
                    <td class="text-center"><input type="checkbox" name="box[` + boxes_count + `][rent]"></td>
                    <td class="text-right"><button class="btn btn-danger" data-action="remove-box">{{ __('Remove') }}</button></td>
                </tr>
            `);

            $(document).find(`[name="box[` + boxes_count + `][virtual_box_id]"]`).append($('<option>', {
                value: '',
                text: '-- {{ __('Not selected') }} --'
            }));

            @foreach($virtual_boxes_free as $virtual_box)
            $(document).find(`[name="box[` + boxes_count + `][virtual_box_id]"]`).append($('<option>', {
                value: {{ $virtual_box->id }},
                text: '{{ $virtual_box->name }}'
            }));
            @endforeach
        });

        $(document).on('click', '[data-action="add-product"]', function(event) {
            event.preventDefault();

            let $button = $(this);
            let $table = $button.closest('table');

            products_count -= 1;

            $table.find('tbody').append(`
                <tr>
                    <td>
                        <select class="form-control" name="product[` + products_count + `][id]">
                            @foreach(\App\Models\Product::all() as $product)
            <option value="{{ $product->id }}" data-price={{ $product->price }}>{{ $product->title }}</option>
                            @endforeach
            </select>
        </td>
        <td><input type="number" class="form-control" name="product[` + products_count + `][count]" value="0"></td>
                    <td data-column="price"></td>
                    <td class="text-right"><button class="btn btn-danger" data-action="remove-product">{{ __('Remove') }}</button></td>
                </tr>
            `)

            $table.find('[name^="product"][name$="[id]"]').trigger('change');
        });

        $(document).on('click', '[data-action="remove-pallet"],[data-action="remove-bulky-item"],[data-action="remove-box"],[data-action="remove-product"]', function(event) {
            event.preventDefault();

            $(this).closest('tr').remove();
        });

        $(document).on('change', '[name^="product"][name$="[id]"]', function(event) {
            let $select = $(this);
            let $option = $select.find('option:selected');
            let $row = $select.closest('tr');

            $row.find('[data-column="price"]').text(parseInt($option.attr('data-price')) + '₪');
        });
    </script>
@endpush

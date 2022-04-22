<x-admin.card title="{{ __('Personal Information') }}" is-collapse="true">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('First name') }}</label>
                <input class="form-control" name="first_name" value="{{ old('first_name') ?? $user?->first_name }}">
                @error('first_name')
                    <div class="text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{ __('Last name') }}</label>
                <input class="form-control" name="last_name" value="{{ old('last_name') ?? $user?->last_name }}">
                @error('last_name')
                <div class="text-red">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{ __('Email') }}</label>
                <input class="form-control" name="email" value="{{ old('email') ?? $user?->email }}">
                @error('email')
                <div class="text-red">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{ __('Phone') }}</label>
                <input class="form-control" name="phone" value="{{ old('phone') ?? $user?->phone }}">
                @error('phone')
                <div class="text-red">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Passport number') }}</label>
                <input class="form-control" name="passport_number" value="{{ old('passport_number') ?? $user?->passport_number }}">
            </div>

            <div class="form-group">
                <label>{{ __('RIVHIT') }}</label>
                <input class="form-control" name="rivhit" value="{{ old('rivhit') ?? $user?->rivhit }}">
            </div>
            <div class="form-group">
                <label>{{ __('Credit type') }}</label>
                <select class="form-control" name="credit_type">
                    @foreach(config('enum.credit_type') as $type)
                        <option value="{{ $type['id'] }}" {{ $type['id'] === (old('credit_type') ?? ($user->credit_type)) ? 'selected' : '' }}>{{ __($type['name']) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>{{ __('Credit card') }}</label>
                <input class="form-control" name="credit_card" value="{{ old('credit_card') ?? $user?->credit_card }}">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Role') }}</label>
                <select class="form-control" name="role_id">
                    @foreach(config('enum.role') as $role)
                        <option value="{{ $role['id'] }}" {{ $role['id'] === (old('role_id') ?? ($user->role_id)) ? 'selected' : '' }}>{{ __($role['name']) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Type') }}</label>
                <select class="form-control" name="client_type_id">
                    @foreach(config('enum.client_type') as $client_type)
                        <option value="{{ $client_type['id'] }}" {{ $client_type['id'] === (old('client_type_id') ?? ($user->client_type_id)) ? 'selected' : '' }}>{{ __($client_type['name']) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Sex') }}</label>
                <select class="form-control" name="sex_id">
                    @foreach(config('enum.sex') as $sex)
                        <option value="{{ $sex['id'] }}" {{ $sex['id'] === (old('sex_id') ?? ($user->sex_id)) ? 'selected' : '' }}>{{ __($sex['name']) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Language') }}</label>
                <select class="form-control" name="language_id">
                    @foreach(config('enum.language') as $language)
                        <option value="{{ $language['id'] }}" {{ $language['id'] === (old('language_id') ?? ($user->language_id)) ? 'selected' : '' }}>{{ __($language['name']) }}</option>
                    @endforeach
                </select>
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>{{ __('Comment') }}</label>
                <textarea class="form-control" name="comment" rows="3">{{ old('comment') ?? $user?->comment }}</textarea>
            </div>
        </div>
    </div>
</x-admin.card>

<x-admin.card title="{{ __('Address Information') }}" is-collapse="true">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Country') }}</label>
                <select class="form-control" name="country_id">
                    @foreach(config('enum.country') as $country)
                        <option value="{{ $country['id'] }}" {{ $country['id'] === (old('country_id') ?? ($user->country_id)) ? 'selected' : '' }}>{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Index') }}</label>
                <input type="number" class="form-control" name="address_index" value="{{ old('address_index') ?? $user?->address_index }}">
                @error('address_index')
                    <div class="text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('City') }}</label>
                <input class="form-control" name="address_city" value="{{ old('address_city') ?? $user?->address_city }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Street') }}</label>
                <input class="form-control" name="address_street" value="{{ old('address_street') ?? $user?->address_street }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('House') }}</label>
                <input class="form-control" name="address_house" value="{{ old('address_house') ?? $user?->address_house }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Apartment number') }}</label>
                <input class="form-control" name="entrance_apartment" value="{{ old('entrance_apartment') ?? $user?->entrance_apartment }}">
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Floor') }}</label>
                <input class="form-control" name="entrance_floor" value="{{ old('entrance_floor') ?? $user?->entrance_floor }}">
                @error('entrance_floor')
                    <div class="text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Entrance Code') }}</label>
                <input class="form-control" name="entrance_code" value="{{ old('entrance_code') ?? $user?->entrance_code }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Elevator') }}</label>
                <select class="form-control" name="entrance_elevator">
                    @if($user?->entrance_elevator)
                        <option value="1" selected>{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    @else
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0" selected>{{ __('No') }}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
</x-admin.card>

<x-admin.card title="{{ __('Company Information') }}" is-collapse="true">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Company name') }}</label>
                <input class="form-control" name="company_name" value="{{ old('company_name') ?? $user?->company_name }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('Company number') }}</label>
                <input class="form-control" name="company_number" value="{{ old('company_number') ?? $user?->company_number }}">
            </div>
        </div>
    </div>
</x-admin.card>

<x-admin.card title="{{ __('Password') }}" is-collapse="true">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>{{ __('New password') }}</label>
                <input class="form-control" type="password" name="password">
                @error('password')
                    <div class="text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>{{ __('Confirm new password') }}</label>
                <input class="form-control" type="password" name="password_confirmation">
                @error('password')
                    <div class="text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</x-admin.card>

@if($user->exists)
    <x-admin.card title="{{ __('Orders') }}" is-collapse="true">
        <x-slot name="body" class="p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Service') }}</th>
                    <th>{{ __('Order status') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->orders()->with(['service'])->orderByDesc('id')->get() as $order)
                    <tr>
                        <td style="width: .1%">{{ $order->id }}</td>
                        <td>{{ $order->service->name }}</td>
                        <td>{{ __(get_enum_name('order_status', $order->order_status_id)) }}</td>
                        <td style="width: .1%">{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                        <td style="width: .1%">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-primary" target="_blank">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-admin.card>
@endif

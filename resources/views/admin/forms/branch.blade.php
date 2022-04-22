<x-admin.tab>
    @foreach(config('app.locales') as $code => $language)
        <x-slot :name="'tab-' . $code" title="{{ $language }}">
            <div class="form-group">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name[{{ $code }}]" value="{{ $branch->getTranslation('name', $code) }}">
            </div>

            <div class="form-group">
                <label>{{ __('Address') }}</label>
                <input type="text" class="form-control" name="address[{{ $code }}]" value="{{ $branch->getTranslation('address', $code) }}">
            </div>

            <div class="form-group">
                <label>{{ __('Service area') }}</label>
                <textarea class="form-control" rows="5" name="service_area[{{ $code }}]">{{ $branch->getTranslation('service_area', $code) }}</textarea>
            </div>
        </x-slot>
    @endforeach
</x-admin.tab>

<div class="form-group">
    <label>{{ __('Location') }}</label>
    <input type="text" class="form-control" name="map_google_url" value="{{ $branch->map_google_url }}">
</div>

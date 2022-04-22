<nav class="mb-2">
    <div class="nav nav-tabs" id="nav-tab-service" role="tablist">
        @foreach(config('app.locales') as $code => $language)
            <a class="nav-item nav-link {{ $loop->first ? 'active show' : '' }}" id="service-language-{{ $code }}-nav" data-toggle="tab" href="#service-language-{{ $code }}-tab" role="tab" aria-controls="nav-home" aria-selected="true">{{ $language }}</a>
        @endforeach
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach(config('app.locales') as $code => $language)
        <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="service-language-{{ $code }}-tab" role="tabpanel" aria-labelledby="service-language-{{ $code }}-nav">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name[{{ $code }}]" value="{{ $service ? $service->getTranslation('name', $code) : '' }}">
            </div>

            <div class="form-group">
                <label>{{ __('Short name') }}</label>
                <input type="text" class="form-control" name="short_name[{{ $code }}]" value="{{ $service ? $service->getTranslation('short_name', $code) : '' }}">
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label>{{ __('Main products') }}</label>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input id="checkbox-has-boxes" type="checkbox" class="custom-control-input" name="has_boxes" value="1" {{ $service->has_boxes ? 'checked' : '' }}>
                    <label class="custom-control-label" for="checkbox-has-boxes">{{ __('Boxes') }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input id="checkbox-has-pallets" type="checkbox" class="custom-control-input" name="has_pallets" value="1" {{ $service->has_pallets ? 'checked' : '' }}>
                    <label class="custom-control-label" for="checkbox-has-pallets">{{ __('Pallets') }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input id="checkbox-has-bulky-items" type="checkbox" class="custom-control-input" name="has_bulky_items" value="1" {{ $service->has_bulky_items ? 'checked' : '' }}>
                    <label class="custom-control-label" for="checkbox-has-bulky-items">{{ __('Bulky Items') }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label>{{ __('Additional products') }}</label>
    <div class="select2-purple">
        <select class="select2" multiple="multiple" data-placeholder="Выберите товары" data-dropdown-css-class="select2-purple" style="width: 100%;" name="products[]">
            @foreach(\App\Models\Product::all() as $product)
                <option value="{{ $product->id }}" {{ $service->products->find($product) ? 'selected' : '' }}>{{ $product->title }} #{{ $product->id }}</option>
            @endforeach
        </select>
    </div>
</div>

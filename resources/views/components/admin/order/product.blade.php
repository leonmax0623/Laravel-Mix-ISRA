<nav class="mb-2">
    <div class="nav nav-tabs" id="nav-tab-product" role="tablist">
        @foreach(config('app.locales') as $code => $language)
            <a class="nav-item nav-link {{ $loop->first ? 'active show' : '' }}" id="product-language-{{ $code }}-nav" data-toggle="tab" href="#product-language-{{ $code }}-tab" role="tab" aria-controls="nav-home" aria-selected="true">{{ $language }}</a>
        @endforeach
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach(config('app.locales') as $code => $language)
        <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="product-language-{{ $code }}-tab" role="tabpanel" aria-labelledby="product-language-{{ $code }}-nav">
            <div class="form-group">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" name="title[{{ $code }}]" value="{{ $product ? $product->getTranslation('title', $code) : '' }}">
            </div>

            <div class="form-group">
                <label>{{ __('Description') }}</label>
                <input type="text" class="form-control" name="description[{{ $code }}]" value="{{ $product ? $product->getTranslation('description', $code) : '' }}">
            </div>
        </div>
    @endforeach

    <div class="form-group">
        @if($product->hasImage())
            <img src="{{ $product->getImageUrl(100, 100) }}" alt="{{ $product->title }}"/>
        @endif
    </div>

    <div class="form-group">
        <label>{{ __('Image') }}</label>
        <input type="file" class="d-block" name="image">
    </div>

        <div class="form-group">
            <label>{{ __('Price') }}</label>
            <input type="text" class="form-control" name="price" value="{{ $product ? $product->price : 0 }}">
        </div>
</div>

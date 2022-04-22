<x-admin.tab>
    @foreach(config('app.locales') as $code => $language)
        <x-slot :name="'tab-' . $code" title="{{ $language }}">
            <div class="form-group">
                <label>{{ __('Title') }}</label>
                <input type="text" class="form-control" name="title[{{ $code }}]" value="{{ $wp->getTranslation('title', $code) }}">
            </div>

            <div class="form-group">
                <label>{{ __('HTML') }}</label>
                <textarea name="html[{{ $code }}]" rows="30">{{ $wp->getTranslation('html', $code) }}</textarea>
            </div>
        </x-slot>
    @endforeach
</x-admin.tab>

<div class="form-group">
    <label>{{ __('SEO URL') }}</label>
    <input type="text" class="form-control" name="slug" value="{{ $wp->slug }}">
</div>

@push('scripts')
    <script>
        $('[name^="html["]').summernote({
            height: 300
        });
    </script>
@endpush

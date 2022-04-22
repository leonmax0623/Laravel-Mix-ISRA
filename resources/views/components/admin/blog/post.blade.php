<form action="{{ $post ? route('admin.blog.edit.request', ['id' => $post->id]) : route('admin.blog.create.request') }}" method="post">
    @csrf

    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Summernote
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <nav class="mb-2">
                <div class="nav nav-tabs" id="nav-tab-post" role="tablist">
                    @foreach(config('app.locales') as $code => $language)
                        <a class="nav-item nav-link {{ $loop->first ? 'active show' : '' }}" id="post-language-{{ $code }}-nav" data-toggle="tab" href="#post-language-{{ $code }}-tab" role="tab" aria-controls="nav-home" aria-selected="true">{{ $language }}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach(config('app.locales') as $code => $language)
                    <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="post-language-{{ $code }}-tab" role="tabpanel" aria-labelledby="post-language-{{ $code }}-nav">
                        <div class="form-group">
                            <label>Заголовок</label>
                            <input type="text" class="form-control" name="post[title][{{ $code }}]" value="{{ $post ? $post->getTranslation('title', $code) : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            <textarea class="summernote" name="post[preview][{{ $code }}]">{{ $post ? $post->getTranslation('preview', $code) : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea class="summernote" name="post[description][{{ $code }}]">{{ $post ? $post->getTranslation('description', $code) : '' }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <x-admin.form.input.image name="image" value="{{ $post ? $post->image?->file : '' }}"/>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">{{ __('button.save') }}</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $('.summernote').summernote();
    </script>
@endpush

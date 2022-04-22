<x-admin.card title="{{ $question->exists && !empty($question->question) ? $question->question : __('Enter question') }}" is-collapse>
    <nav class="mb-2">
        <div class="nav nav-tabs" id="nav-tab-question-{{ $question->id }}" role="tablist">
            @foreach(config('app.locales') as $code => $language)
                <a class="nav-item nav-link {{ $loop->first ? 'active show' : '' }}" id="nav-{{ $question->id }}-{{ $code }}-tab" data-toggle="tab" href="#nav-{{ $question->id }}-{{ $code }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ $language }}</a>
            @endforeach
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        @foreach(config('app.locales') as $code => $language)
            <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="nav-{{ $question->id }}-{{ $code }}" role="tabpanel" aria-labelledby="nav-{{ $question->id }}-{{ $code }}-tab">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $question->getTranslation('question', $code)  ?? __('admin.pages.faq.questions.default-question') }}" name="question[{{ $question->id }}][question][{{ $code }}]">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="question[{{ $question->id }}][answer][{{ $code }}]">{{ $question->getTranslation('answer', $code) ?? __('admin.pages.faq.questions.default-answer') }}</textarea>
                </div>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <button class="btn btn-danger btn-sm" data-action="remove-question">{{ __('Remove') }}</button>
    </div>
</x-admin.card>

@push('scripts')
    @once
        <script>
            $(document).on('click', '[data-action="remove-question"]', function() {
                if(confirm('{{ __('message.confirmation.action.remove') }}')) {
                    $(this).closest('.card').remove();
                }

                return false;
            });

            $(document).on('keyup change focus blur', '[name^="question["][name$="][question][{{ app()->getLocale() }}]"]', function(e) {
                $(this).closest('.card').find('.card-header > .card-title').text($(this).val());
            });
        </script>
    @endonce
@endpush

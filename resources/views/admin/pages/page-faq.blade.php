@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.pages.faq.update') }}" method="post">
        @csrf

        <div class="container-fluid">
            <button id="addQuestion" class="btn btn-primary">{{ __('Add') }}</button>
            <button id="saveQuestion" class="btn btn-success" type="submit">{{ __('Save') }}</button>
        </div>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-12">
                    <x-admin.card title="{{ __('Frequently asked questions') }}" id="faq-list">
                        @foreach(\App\Models\Question::all() as $question)
                            <x-admin.forms.faq :question="$question"/>
                        @endforeach
                    </x-admin.card>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        var question_index = {{ \App\Models\Question::max('id') ?? 0 }};

        $('#addQuestion').on('click', function() {
            addQuestion(++question_index);

            return false;
        });

        function addQuestion(id) {
            let $el = $(`<x-admin.forms.faq :question="new App\Models\Question()"/>`);

            let collapse_id = 'collapse-' + Date.now();

            $el.find('[id^="collapse-"]').attr('id', collapse_id);
            $el.find('[href^="#collapse-"]').attr('href', '#' + collapse_id);

            $el.find('[name^="question[]["]').each(function() {
                $(this).attr('name', $(this).attr('name').replace('question[][', 'question[' + id + ']['));
            });

            $('#faq-list > .card-body').append($el).click();
        }
    </script>
@endpush

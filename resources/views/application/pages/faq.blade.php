@extends('layout.application')

@section('main')
    <div class="quests container">
        <div class="quests-h">
            <img src="/storage/images/quests-icon.png" alt="quests" class="quests-h__icon">
            <h1 class="quests-h__title">{{ __('Frequently Asked Questions about Storage and Warehouse Services') }}</h1>
        </div>
        <div class="quests-b">
            @foreach(\App\Models\Question::all() as $question)
                <div class="quests-item">
                    <div class="quests-qst">{{ $question->question }}</div>
                    <div class="quests-ans">{{ $question->answer }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

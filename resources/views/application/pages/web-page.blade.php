@extends('layout.application')

@section('main')
    <div class="fb">
        <div class="container">
            <div class="fb-h">
                <h2 class="fb-h__title">{{ $web_page->title }}</h2>
            </div>
            <div class="fb__inner">
                {!! $web_page->html !!}
            </div>
        </div>
    </div>
@endsection

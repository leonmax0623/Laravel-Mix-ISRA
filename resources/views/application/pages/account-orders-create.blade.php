@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active">
                <div id="order-step-services" class="on active">
                    <div class="on-h">
                        <h2 class="on-h-title">{{ __('Choose order type') }}:</h2>
                    </div>
                    <div class="on-b types">
                        @foreach($list as $item)
                            <a href="{{ route($item['route']) }}" class="types-item">
                                <div class="types-icon">
                                    <img src="/storage/images/order-type-1.png" alt="{{ $item['service']->name }}">
                                </div>
                                <div class="types-title" style="text-align: center">{{ $item['service']->name }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

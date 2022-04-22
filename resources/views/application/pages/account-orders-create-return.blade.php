@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active steps-wrapper">
                <form id="form-create-order-return" action="{{ route('account.orders.create.return') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="on step1 step-container" data-step="1">
                        <div class="on-h">
                            <div class="on-h-t">
                                <h2 class="on-h-title">{{ $service->name }}</h2>
                                <div class="on-h-subtitle">{{ __('Select the order for which you want to return from the warehouse.') }}</div>
                            </div>
                            <div class="on-h-step">
                                <div class="on-h-step__text">{{ __('Step') }}</div>
                                <div class="on-h-step__num">1/2</div>
                            </div>
                        </div>
                        <div class="on-b" style="padding-bottom: 35px;">
                            @foreach($orders as $order)
                                <label for="checkbox-order-id-{{ $order->id }}" class="step-btn-next" style="display: block;">
                                    @include('application.components.order.order-item', ['order' => $order])

                                    <input id="checkbox-order-id-{{ $order->id }}" type="checkbox" style="display: none" name="order_id" value="{{ $order->id }}">
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="on step2 step-container" data-step="2">
                        <div class="on-h">
                            <div class="on-h-t">
                                <h2 class="on-h-title">{{ $service->name }}</h2>
                            </div>
                            <div class="on-h-step">
                                <div class="on-h-step__text">{{ __('Step') }}</div>
                                <div class="on-h-step__num">2/2</div>
                            </div>
                        </div>
                        <div class="on-b">
                            <div class="acc-form-item on-form-textarea__wrapper form-item">
                                <label for="comment" class="acc-form-label form-label">
                                    <div class="acc-form-label__text form-label__text">{{ __('Specify the details of the return, full or partial?') }} *</div>
                                </label>
                                <textarea id="comment" class="on-form-textarea" name="comment"></textarea>
                            </div>

                            <div class="on-b-f">
                                <a href="#" class="on-btn form-btn link-arrow prev step-btn-prev">{{ __('Back') }}</a>
                                <button type="submit" class="on-btn form-btn link-arrow next on-f-btn" style="transform: translateY(50%);">{{ __('Send order') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

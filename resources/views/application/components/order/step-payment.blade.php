<div class="on step{{ $step }} step-container" data-step="{{ $step }}">
    <div class="on-h">
        <h2 class="on-h-title">{{ $service->name }}</h2>
        <div class="on-h-step">
            <div class="on-h-step__text">{{ __('Step') }}</div>
            <div class="on-h-step__num">{{ $step }}/{{ $step_total }}</div>
        </div>
    </div>

    <div class="on-b on-pm__wrapper">
        <div class="on-b-title">{{ __('Payment Method') }}</div>
        @foreach(config('enum.payment_type') as $payment_type)
            <div class="checkbox on-pm">
                <label>
                    <input type="radio" name="payment_type_id" value="{{ $payment_type['id'] }}" class="checkbox-input" {{ $loop->first ? 'checked' : '' }}>
                    <div class="checkbox-radio">
                        <div class="checkbox-radio-checked"></div>
                    </div>
                    <div class="on-pm-info">
                        <div class="on-pm-info__icon">
                            <img src="{{ asset('/storage/images/credit-cards-icon.png') }}" alt="{{ __($payment_type['name']) }}">
                        </div>
                        <div class="on-pm-info__text">{{ __($payment_type['name']) }}</div>
                    </div>
                </label>
            </div>
        @endforeach
    </div>

    <div class="on-b on-ttl">
        <div class="on-ttl-row">
            <div class="on-ttl-label">{{ __('Subtotal') }}:</div>
            <div id="payment-subtotal-price" class="on-ttl-value">0.00</div>
        </div>
{{--        <div class="on-ttl-row">--}}
{{--            <div class="on-ttl-label">{{ __('Discount') }}:</div>--}}
{{--            <div id="payment-discount-price" class="on-ttl-value _grey">0.00</div>--}}
{{--        </div>--}}
{{--        <div class="on-ttl-row">--}}
{{--            <div class="on-ttl-label">{{ __('Delivery') }}</div>--}}
{{--            <div id="payment-delivery-price" class="on-ttl-value _green">free</div>--}}
{{--        </div>--}}
        <div class="on-ttl-row">
            <div class="on-ttl-label">{{ __('Total') }}:</div>
            <div id="payment-total-price" class="on-ttl-value _red">0.00</div>
        </div>
    </div>

    <div class="on-f">
        <button type="submit" class="on-btn form-btn link-arrow prev step-btn-prev" style="transform: none;">{{ __('Back') }}</button>
        <div class="acc-form-checkbox__wrapper on-f-checkbox">
            <div class="acc-form-item checkbox acc-form-checkbox form-item">
                <label>
                    <input type="checkbox" class="checkbox-input" name="agreement">
                    <div class="checkbox-switch">
                        <div class="checkbox-switch-icon"></div>
                    </div>
                    <div class="acc-form-checkbox__text">{{ __('I agree with Terms') }}</div>
                </label>
            </div>
        </div>
        <button type="submit" class="on-btn form-btn link-arrow next on-f-btn">{{ __('Send order') }}</button>
    </div>
</div>

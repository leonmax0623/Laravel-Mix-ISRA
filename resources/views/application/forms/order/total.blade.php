<form id="form-order-step-total" action="{{ route('account.order.service.form-total.validate', ['service_id' => $service->id]) }}" method="post">
    @csrf

    <div id="order-step-total" class="on active">
        <div class="on-h">
            <h2 class="on-h-title">{{ $service->name }}</h2>
        </div>
        <div class="on-b on-pm__wrapper">
            <div class="on-b-title">{{ __('Payment Method') }}</div>
            @foreach(\App\Models\PaymentType::all() as $payment)
                <div class="checkbox on-pm">
                    <label>
                        <input type="radio" name="payment" value="{{ $payment->slug }}" class="checkbox-input" {{ $loop->first ? 'checked' : '' }}>

                        <div class="checkbox-radio">
                            <div class="checkbox-radio-checked"></div>
                        </div>

                        <div class="on-pm-info">
                            <div class="on-pm-info__icon">
                                <img src="/storage/images/credit-cards-icon.png" alt="credit cards">
                            </div>
                            <div class="on-pm-info__text">{{ $payment->name }}</div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
        <div class="on-b on-ttl">
            <div class="on-ttl-row">
                <div class="on-ttl-label">{{ __('Subtotal') }}:</div>
                <div class="on-ttl-value">{{ number_format($total, 2, '.', '') }}</div>
            </div>
{{--            <div class="on-ttl-row">--}}
{{--                <div class="on-ttl-label">Discount:</div>--}}
{{--                <div class="on-ttl-value _grey">0.00</div>--}}
{{--            </div>--}}
{{--            <div class="on-ttl-row">--}}
{{--                <div class="on-ttl-label">Delivery</div>--}}
{{--                <div class="on-ttl-value _green">free</div>--}}
{{--            </div>--}}
            <div class="on-ttl-row">
                <div class="on-ttl-label">{{ __('Total') }}:</div>
                <div class="on-ttl-value _red">{{ number_format($total, 2, '.', '') }}</div>
            </div>
        </div>
        <div class="on-f" style="justify-content: space-between">
            <a href="{{ route('account.order.service.form-address', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow prev step-btn-prev on-f-btn">{{ __('Back') }}</a>

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
</form>

<script>
    $('#order-step-total .on-f a.prev').on('click', function() {
        event.preventDefault();

        $(document).find('#acc-block-order').load($(this).attr('href'));
    });

    $('#form-order-step-total').on('submit', function(event) {
        let $form = $(this);
        let $button = $(event.originalEvent.submitter);

        event.preventDefault();

        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: $form.serializeArray(),
            dataType: 'json',

            beforeSend: function() {
                $form.find('.error-input-field').remove();

                let html = '{{ __('We process your order...') }}';

                $form.blurElement(html);
            },

            success: function() {
                $.post('{{ route('account.order.create') }}', {'_token': '{{ csrf_token() }}'})
                    .done(function(response) {
                        let html = '<img src="/storage/images/svg/fa-shopping-bag-solid.svg" style="width: 8rem">' +
                            '<br>' +
                            '{{ __('Your order has been successfully placed!') }}';

                        $form.blurElement(html);

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    })
                    .fail(function(xhr, status, error) {
                        $form.blurElementDisable();
                    });
            },

            error: function(xhr) {
                $form.blurElementDisable();

                if(typeof xhr['responseJSON'] !== 'undefined') {
                    let json = xhr['responseJSON'];

                    if(typeof json.errors !== 'undefined') {
                        $.each(json.errors, function(field, errors) {
                            let name = field.split('.').map(function(v, k) {
                                return k === 0 ? v : ('[' + v + ']');
                            }).join('');

                            let $input = $form.find('input[name="' + name + '"]');

                            if($input.closest('label').length) {
                                $input.closest('label').after('<div class="error-input-field" style="color: #f00; margin-top: 5px">' + errors[0] + '</div>');
                            } else {
                                $input.after('<div class="error-input-field" style="color: #f00; margin-top: 5px">' + errors[0] + '</div>');
                            }
                        });
                    }
                }
            }
        });
    });
</script>

<form id="form-order-step-products-main" action="{{ route('account.order.service.form-products-main.validate', ['service_id' => $service->id]) }}" method="post">
    @csrf

    <div id="order-step-products-main" class="on active">
        <div class="on-h">
            <div class="on-h-t">
                <h2 class="on-h-title">{{ $service->name }}</h2>
            </div>
        </div>
        <div class="on-b">
            @if($service->has_boxes)
                <div class="on-item">
                    <div class="on-item-info">
                        <div class="on-item-photo">
                            <img src="{{ asset('/storage/images/order-item-1.png') }}">
                        </div>
                        <div class="on-item-t">
                            <div class="on-item-title">{{ __('Box')}}</div>
                        </div>
                    </div>

                    <div class="on-item-counter" data-count="{{ session('order.boxes_count', 0) }}">
                        <div class="minus"><img src="{{ asset('storage/images/svg/order-product-minus.svg') }}"></div>
                        <div class="count">{{ session('order.boxes_count', 0) }}</div>
                        <div class="plus"><img src="{{ asset('storage/images/svg/order-product-plus.svg') }}"></div>

                        <input type="hidden" name="boxes_count" value="{{ session('order.boxes_count', 0) }}">
                    </div>
                </div>
            @endif

            @if($service->has_pallets)
                <div class="on-item">
                    <div class="on-item-info">
                        <div class="on-item-photo">
                            <img src="{{ asset('/storage/images/order-item-3.png') }}">
                        </div>
                        <div class="on-item-t">
                            <div class="on-item-title">{{ __('Pallet')}}</div>
                        </div>
                    </div>

                    <div class="on-item-counter" data-count="{{ session('order.pallets_count', 0) }}">
                        <div class="minus"><img src="{{ asset('storage/images/svg/order-product-minus.svg') }}"></div>
                        <div class="count">{{ session('order.pallets_count', 0) }}</div>
                        <div class="plus"><img src="{{ asset('storage/images/svg/order-product-plus.svg') }}"></div>

                        <input type="hidden" name="pallets_count" value="{{ session('order.pallets_count', 0) }}">
                    </div>
                </div>
            @endif

            @if($service->has_bulky_items)
                <div class="on-item">
                    <div class="on-item-info">
                        <div class="on-item-photo">
                            <img src="{{ asset('/storage/images/order-item-2.png') }}">
                        </div>
                        <div class="on-item-t">
                            <div class="on-item-title">{{ __('Bulky Item')}}</div>
                        </div>
                    </div>

                    <div class="on-item-counter" data-count="{{ session('order.bulky_items_count', 0) }}">
                        <div class="minus"><img src="{{ asset('storage/images/svg/order-product-minus.svg') }}"></div>
                        <div class="count">{{ session('order.bulky_items_count', 0) }}</div>
                        <div class="plus"><img src="{{ asset('storage/images/svg/order-product-plus.svg') }}"></div>

                        <input type="hidden" name="bulky_items_count" value="{{ session('order.bulky_items_count', 0) }}">
                    </div>
                </div>
            @endif

            <div class="on-b-f" style="justify-content: space-between">
                <a href="{{ route('account.order.form-services') }}" class="on-btn form-btn link-arrow prev step-btn-prev">{{ __('Back to services') }}</a>
                <button type="submit" data-href="{{ route('account.order.service.form-products-additional', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow next step-btn-next">{{ __('Continue') }}</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#order-step-products-main .on-b a.prev').on('click', function() {
        event.preventDefault();

        $(document).find('#acc-block-order').load($(this).attr('href'));
    });

    $('#form-order-step-products-main').on('submit', function(event) {
        let $form = $(this);
        let $button = $(event.originalEvent.submitter);

        event.preventDefault();

        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: $form.serializeArray(),
            dataType: 'json',

            beforeSend: function() {
                $('#order-step-products-main').find('.step-error').remove();
            },

            success: function() {
                console.log(2);
                $(document).find('#acc-block-order').load($button.attr('data-href'));
            },

            error: function(xhr) {
                if(typeof xhr['responseJSON'] !== 'undefined') {
                    let json = xhr['responseJSON'];

                    if(typeof json.errors !== 'undefined') {
                        let message = $.map(json.errors, function(values) {
                            return values.join('<br>');
                        }).join('<br>');

                        if(message.length) {
                            $('#order-step-products-main .on-b').prepend('<div class="step-error" style="text-align: center; color: #f00; margin-bottom: 10px">' + message + '</div>');
                        }
                    }
                }
            }
        });
    });
</script>

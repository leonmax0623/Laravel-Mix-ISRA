<form id="form-order-step-products-additional" action="{{ route('account.order.service.form-products-additional.validate', ['service_id' => $service->id]) }}" method="post">
    @csrf

    <div id="order-step-products-additional" class="on active">
        <div class="on-h">
            <div class="on-h-t">
                <h2 class="on-h-title">{{ $service->name }}</h2>
                <div class="on-h-subtitle">{{ __('Do you need other services?') }}</div>
            </div>
        </div>
        <div class="on-b">
            @foreach($service->products as $product)
                <div class="on-item">
                    <div class="on-item-info">
                        <div class="on-item-photo">
                            <img src="{{ $product->getImageUrl(100) }}" alt="{{ $product->title }}">
                        </div>

                        <div class="on-item-t">
                            <div class="on-item-title">{{ $product->title }}</div>

                            @if($product->description)
                                <div class="on-item-extrainfo">{{ $product->description }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="on-item-counter" data-count="{{ session('order.products.' . $product->id, 0) }}">
                        <div class="minus"><img src="{{ asset('storage/images/svg/order-product-minus.svg') }}"></div>
                        <div class="count">{{ session('order.products.' . $product->id, 0) }}</div>
                        <div class="plus"><img src="{{ asset('storage/images/svg/order-product-plus.svg') }}"></div>

                        <input type="hidden" name="products[{{ $product->id }}]" value="{{ session('order.products.' . $product->id, 0) }}">
                    </div>
                </div>
            @endforeach

            <div class="on-b-f" style="justify-content: space-between">
                <a href="{{ route('account.order.service.form-products-main', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow prev step-btn-prev">{{ __('Back') }}</a>
                <button type="submit" data-href="{{ route('account.order.service.form-address', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow next step-btn-next">{{ __('Continue') }}</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#order-step-products-additional .on-b a.prev').on('click', function() {
        event.preventDefault();

        $(document).find('#acc-block-order').load($(this).attr('href'));
    });

    $('#form-order-step-products-additional').on('submit', function(event) {
        let $form = $(this);
        let $button = $(event.originalEvent.submitter);

        event.preventDefault();

        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: $form.serializeArray(),
            dataType: 'json',

            beforeSend: function() {
                $('#order-step-products-additional').find('.step-error').remove();
            },

            success: function() {
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
                            $('#order-step-products-additional .on-b').prepend('<div class="step-error" style="text-align: center; color: #f00; margin-bottom: 10px">' + message + '</div>');
                        }

                        scrollToView($('#order-step-products-additional .on-b').find('.step-error'));
                    }
                }
            }
        });
    });

    @if(!$service->products->count())
        $(document).ready(function() {
            $('#form-order-step-products-additional').find('button[type="submit"]').click();
        });
    @endif

    function scrollToView(element){
        let offset = element.offset().top;
        if(!element.is(":visible")) {
            element.css({"visibility":"hidden"}).show();

            let offset = element.offset().top;

            element.css({"visibility":"", "display":""});
        }


        var visible_area_start = $(window).scrollTop();
        var visible_area_end = visible_area_start + window.innerHeight;

        if(offset < visible_area_start || offset > visible_area_end){
            $('html,body').animate({scrollTop: offset - window.innerHeight / 3}, 1000);

            return false;
        }

        return true;
    }
</script>

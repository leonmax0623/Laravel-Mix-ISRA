<form id="form-order-step-address" action="{{ route('account.order.service.form-address.validate', ['service_id' => $service->id]) }}" method="post">
    @csrf

    <div id="order-step-address" class="on active">
        <div class="on-h">
            <h2 class="on-h-title">{{ $service->name }}</h2>
        </div>

        <div class="acc-form__wrapper">
            <div class="acc-form form _bottom">
                <div class="acc-form-row">
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="delivery-date" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Delivery Date') }} *</div>
                            </label>
                            <input type="text" id="delivery-date" class="acc-form-input input" name="address[delivery_date]" data-inputmask="'alias': 'datetime', 'inputFormat': 'dd.mm.yyyy', 'placeholder': '__.__.____'" value="{{ session('order.address.delivery_date') }}">
                        </div><!-- /.form-item -->
                    </div>
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="delivery-time" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Delivery Time') }} *</div>
                            </label>
                            <input type="text" id="delivery-time" class="acc-form-input input" name="address[delivery_time]" data-inputmask="'alias': 'datetime', 'inputFormat': 'HH:mm', 'placeholder': '__:__'" value="{{ session('order.address.delivery_time') }}">
                        </div><!-- /.form-item -->
                    </div>
                </div>
                <div class="acc-form-row">
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="pickup-date" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Pick-up Date') }} *</div>
                            </label>
                            <input type="text" id="pickup-date" class="acc-form-input input" name="address[pickup_date]" data-inputmask="'alias': 'datetime', 'inputFormat': 'dd.mm.yyyy', 'placeholder': '__.__.____'" value="{{ session('order.address.pickup_date') }}">
                        </div><!-- /.form-item -->
                    </div>
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="pickup-time" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Pick-up Time') }} *</div>
                            </label>
                            <input type="text" id="pickup-time" class="acc-form-input input" name="address[pickup_time]" data-inputmask="'alias': 'datetime', 'inputFormat': 'HH:mm', 'placeholder': '__:__'" value="{{ session('order.address.pickup_time') }}">
                        </div><!-- /.form-item -->
                    </div>
                </div>
                <div class="acc-form-row">
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="expiry-date" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Expiry date') }} *</div>
                            </label>
                            <input type="text" id="expiry-date" class="acc-form-input input" name="address[expiry_date]" data-inputmask="'alias': 'datetime', 'inputFormat': 'dd.mm.yyyy', 'placeholder': '__.__.____'" value="{{ session('order.address.expiry_date') }}">
                        </div><!-- /.form-item -->
                    </div>
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="promocode" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Promo Code') }}</div>
                            </label>
                            <div class="acc-form-code__wrapper">
                                <input type="text" id="promocode" class="acc-form-code__input" name="address[promocode]">
                                <div class="acc-form-code-btn">
                                    <div class="acc-form-code__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 229.153 229.153" style="enable-background:new 0 0 229.153 229.153;" xml:space="preserve">
              <path d="M92.356,223.549c7.41,7.5,23.914,5.014,25.691-6.779c11.056-73.217,66.378-134.985,108.243-193.189   C237.898,7.452,211.207-7.87,199.75,8.067C161.493,61.249,113.274,117.21,94.41,181.744   c-21.557-22.031-43.201-43.853-67.379-63.212c-15.312-12.265-37.215,9.343-21.738,21.737   C36.794,165.501,64.017,194.924,92.356,223.549z"/>
            </svg>
                                    </div>
                                    <div class="acc-form-code__text">{{ __('Apply') }}</div>
                                </div>
                            </div>
                        </div><!-- /.form-item -->
                    </div>
                </div>
                <div class="acc-form-row">
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="numder1" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Phone') }} *</div>
                            </label>
                            <input type="text" id="numder1" class="acc-form-input input" name="address[phone][1]" value="{{ session('order.address.phone.1', auth()->user()->phone) }}">
                        </div><!-- /.form-item -->
                    </div>
                    <div class="acc-form-g">
                        <div class="acc-form-item form-item">
                            <label for="numder2" class="acc-form-label form-label">
                                <div class="acc-form-label__text form-label__text">{{ __('Phone') }} 2</div>
                            </label>
                            <input type="text" id="numder2" class="acc-form-input input" name="address[phone][2]" value="{{ session('order.address.phone.2') }}">
                        </div><!-- /.form-item -->
                    </div>
                </div>
            </div>
            <div class="acc-form-f">
                <div class="acc-form-f-total">
                    <div class="acc-form-f-total__icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <path d="M164.571,0C103.448,0,0,12.837,0,60.952c0,48.116,103.448,60.952,164.571,60.952s164.571-12.837,164.571-60.952
          C329.143,12.837,225.694,0,164.571,0z M164.571,85.333c-74.338,0-116.943-15.823-126.653-24.381
          c9.71-8.558,52.322-24.381,126.653-24.381s116.943,15.823,126.653,24.381C281.515,69.51,238.909,85.333,164.571,85.333z"/>
                            <path d="M292.571,121.905c0-0.994,0.28-1.701,0.384-1.89c-4.376,7.729-47.537,26.27-128.384,26.27s-124.008-18.542-128.384-26.27
          c0.11,0.189,0.384,0.896,0.384,1.89H0c0,44.989,88.655,60.952,164.571,60.952s164.571-15.963,164.571-60.952H292.571z"/>
                            <path d="M292.571,182.857c0-0.993,0.28-1.701,0.384-1.889c-4.376,7.729-47.537,26.27-128.384,26.27s-124.008-18.542-128.384-26.27
          c0.11,0.189,0.384,0.896,0.384,1.889H0c0,44.989,88.655,60.952,164.571,60.952s164.571-15.963,164.571-60.952H292.571z"/>
                            <path d="M292.571,243.81c0-0.993,0.274-1.701,0.384-1.89c-4.376,7.729-47.537,26.271-128.384,26.271S40.564,249.649,36.187,241.92
          c0.11,0.189,0.384,0.896,0.384,1.89H0c0,44.989,88.655,60.952,164.571,60.952s164.571-15.963,164.571-60.952H292.571z"/>
                            <path d="M198.345,327.942l-1.317,0.073c-10.91,0.579-21.211,1.128-32.457,1.128c-80.847,0-124.008-18.542-128.384-26.271
          c0.11,0.189,0.384,0.896,0.384,1.89H0c0,44.989,88.655,60.952,164.571,60.952c12.209,0,22.985-0.573,34.389-1.182l1.317-0.067
          L198.345,327.942z"/>
                            <path d="M202.453,388.352c-12.142,1.152-24.893,1.743-37.882,1.743c-80.847,0-124.008-18.542-128.384-26.27
          c0.11,0.189,0.384,0.896,0.384,1.89H0c0,44.989,88.655,60.952,164.571,60.952c14.147,0,28.063-0.64,41.35-1.908L202.453,388.352z"
                            />
                            <rect x="292.571" y="60.952" width="36.571" height="225.524"/>
                            <rect y="60.952" width="36.571" height="304.762"/>
                            <path d="M347.429,268.19c-61.123,0-164.571,12.837-164.571,60.952c0,48.116,103.448,60.952,164.571,60.952
          S512,377.259,512,329.143C512,281.027,408.552,268.19,347.429,268.19z M347.429,353.524c-74.338,0-116.943-15.823-126.653-24.381
          c9.71-8.558,52.322-24.381,126.653-24.381s116.937,15.823,126.653,24.381C464.372,337.701,421.766,353.524,347.429,353.524z"/>
                            <path d="M475.429,390.095c0-0.993,0.274-1.701,0.384-1.89c-4.376,7.729-47.537,26.271-128.384,26.271
          s-124.008-18.542-128.384-26.271c0.11,0.189,0.384,0.896,0.384,1.89h-36.571c0,44.989,88.655,60.952,164.571,60.952
          S512,435.084,512,390.095H475.429z"/>
                            <path d="M475.429,451.048c0-0.994,0.274-1.701,0.384-1.889c-4.376,7.729-47.537,26.27-128.384,26.27
          s-124.008-18.542-128.384-26.27c0.11,0.189,0.384,0.896,0.384,1.889h-36.571c0,44.989,88.655,60.952,164.571,60.952
          S512,496.037,512,451.048H475.429z"/>
                            <rect x="475.429" y="329.143" width="36.571" height="121.905"/>
                            <rect x="182.857" y="329.143" width="36.571" height="121.905"/>
    </svg>
                    </div>
                    <div class="acc-form-f-text">{{ __('Total amount') }}:</div>
                    <div class="acc-form-f-text _red">{{ number_format($total, 2) }} Shekeles</div>
                </div>
                <div class="acc-form-f-text acc-form-f-discount">
                    {{ __('Discount') }}:
                    <span>0 %</span>
                </div>
            </div>
        </div>

        <div class="acc-form form">
            <h2 class="acc-form-title">{{ __('Address') }}</h2>
            <div class="acc-form-row">
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="house-num" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('House Number') }}</div>
                        </label>
                        <input type="text" id="house-num" class="acc-form-input input" name="address[house]" value="{{ session('order.address.house', auth()->user()->address_house) }}">
                    </div><!-- /.form-item -->
                </div>
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="city" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('City') }}</div>
                        </label>
                        <input type="text" id="city" class="acc-form-input input" name="address[city]" value="{{ session('order.address.city', auth()->user()->address_city) }}">
                    </div><!-- /.form-item -->
                </div>
            </div>
            <div class="acc-form-row">
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="street" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('Street') }}</div>
                        </label>
                        <input type="text" id="street" class="acc-form-input input" name="address[street]" value="{{ session('order.address.street', auth()->user()->address_street) }}">
                    </div><!-- /.form-item -->
                </div>
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="index" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('Index') }}</div>
                        </label>
                        <input type="text" id="index" class="acc-form-input input" name="address[index]" value="{{ session('order.address.index', auth()->user()->address_index) }}">
                    </div><!-- /.form-item -->
                </div>
            </div>
        </div>

        <div class="acc-form form">
            <h2 class="acc-form-title">{{ __('Entrance') }}</h2>
            <div class="acc-form-row">
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="entrance-code" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('Entrance Code') }}</div>
                        </label>
                        <input type="text" id="entrance-code" class="acc-form-input input" name="address[entrance][code]" value="{{ session('order.address.entrance.code', auth()->user()->entrance_code) }}">
                    </div><!-- /.form-item -->
                </div>
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="floor" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('Floor') }}</div>
                        </label>
                        <input type="text" id="floor" class="acc-form-input input" name="address[entrance][floor]" value="{{ session('order.address.entrance.floor', auth()->user()->entrance_floor) }}">
                    </div><!-- /.form-item -->
                </div>
            </div>
            <div class="acc-form-row">
                <div class="acc-form-g">
                    <div class="acc-form-item form-item">
                        <label for="apart-num" class="acc-form-label form-label">
                            <div class="acc-form-label__text form-label__text">{{ __('Apartment number') }}</div>
                        </label>
                        <input type="text" id="apart-num" class="acc-form-input input" name="address[entrance][apartment]" value="{{ session('order.address.entrance.apartment', auth()->user()->entrance_apartment) }}">
                    </div><!-- /.form-item -->
                </div>
                <div class="acc-form-g acc-form-checkbox__wrapper">
                    <div class="acc-form-item checkbox acc-form-checkbox form-item">
                        <label>
                            <input type="checkbox" class="checkbox-input" name="address[entrance][elevator]" value="1" {{ session('order.address.entrance.elevator', auth()->user()->entrance_elevator) ? 'checked' : '' }}>
                            <div class="checkbox-switch">
                                <div class="checkbox-switch-icon"></div>
                            </div>
                            <div class="acc-form-checkbox__text">{{ __('Elevator') }}</div>
                        </label>
                    </div><!-- /.form-item -->
                </div>
            </div>
        </div>

        <div class="on-b">
                <div class="acc-form-item on-form-textarea__wrapper form-item">
                    <label for="comment" class="acc-form-label form-label">
                        <div class="acc-form-label__text form-label__text">{{ __('Please, add comments for you order') }} *</div>
                    </label>
                    <textarea name="comment" id="comment" class="on-form-textarea">{{ session('order.comment') }}</textarea>
                </div>

                <div class="on-b-f" style="justify-content: space-between">
                    <a href="{{ route('account.order.service.form-products-additional', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow prev step-btn-prev">{{ __('Back') }}</a>
                    <button type="submit" data-href="{{ route('account.order.service.form-total', ['service_id' => $service->id]) }}" class="on-btn form-btn link-arrow next step-btn-next">{{ __('Continue') }}</button>
                </div>
            </div>
    </div>
</form>

<script>
    $('#order-step-address .on-b a.prev').on('click', function() {
        event.preventDefault();

        $(document).find('#acc-block-order').load($(this).attr('href'));
    });

    $('#form-order-step-address').on('submit', function(event) {
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
            },

            success: function() {
                $(document).find('#acc-block-order').load($button.attr('data-href'));
            },

            error: function(xhr) {
                if(typeof xhr['responseJSON'] !== 'undefined') {
                    let json = xhr['responseJSON'];

                    if(typeof json.errors !== 'undefined') {
                        $.each(json.errors, function(field, errors) {
                            let name = field.split('.').map(function(v, k) {
                                return k === 0 ? v : ('[' + v + ']');
                            }).join('');

                            $form.find('input[name="' + name + '"]').after('<div class="error-input-field" style="color: #f00; margin-top: 5px">' + errors[0] + '</div>');

                            console.log(name);
                            // console.log(k, v);
                        });
                    }
                }
            }
        });
    });

    $(":input").inputmask();
</script>

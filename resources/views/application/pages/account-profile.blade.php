@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="acc__wrapper">
        <x-application.widget.profile-menu/>

        <div class="acc-content__wrapper">
            <div class="acc-content active steps-wrapper">
                <div class="profile step1 step-container active" data-step="1">
                    <div class="profile-h">
                        <a href="#" class="profile-link step-btn-next">
                            <span>{{ __('Next page') }}</span>
                            <span class="_red">{{ __('Address') }} >></span>
                        </a>
                    </div>
                    <form id="account-personal-information" action="{{ route('account.update.personal-information') }}" method="POST" class="acc-form form">
                        @csrf

                        <input type="hidden" name="type" value="personalInformation">

                        <h2 class="acc-form-title">{{ __('Personal Information') }}</h2>
                        <div class="acc-form-row">
                            <div class="acc-form-g _sm-flex">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-first-name" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('First Name') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-first-name" name="first_name" class="acc-form-input input" placeholder="Andrey" value="{{ auth()->user()->first_name }}">
                                </div><!-- /.form-item -->
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-last-name" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Last Name') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-last-name" name="last_name" class="acc-form-input input" value="{{ auth()->user()->last_name }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g _sm-w100">
                                <div class="acc-form-item form-item">
                                    <label class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Photo or Avatar Icon') }}</div>
                                    </label>
                                    <div class="acc-form-av__wrapper">
                                        <div class="acc-form-av">
                                            <div class="acc-form-av__icon" style="text-align: center">
                                                <img src="{{ auth()->user()->image->getThumbUrl(100, 100) }}" width="100px" height="100px" alt="avatar">
                                            </div>
                                        </div>
                                        <div class="acc-form-av-btns">
                                            <label for="avatar" class="acc-form-av-btn">
                                                <input type="file" id="avatar" name="avatar" class="acc-form-av-btn__input">
                                                <div class="acc-form-av-btn__icon upload">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 29.978 29.978" style="enable-background:new 0 0 29.978 29.978;" xml:space="preserve">
                            <path d="M25.462,19.105v6.848H4.515v-6.848H0.489v8.861c0,1.111,0.9,2.012,2.016,2.012h24.967c1.115,0,2.016-0.9,2.016-2.012
                              v-8.861H25.462z"/>
                                                        <path d="M14.62,18.426l-5.764-6.965c0,0-0.877-0.828,0.074-0.828s3.248,0,3.248,0s0-0.557,0-1.416c0-2.449,0-6.906,0-8.723
                              c0,0-0.129-0.494,0.615-0.494c0.75,0,4.035,0,4.572,0c0.536,0,0.524,0.416,0.524,0.416c0,1.762,0,6.373,0,8.742
                              c0,0.768,0,1.266,0,1.266s1.842,0,2.998,0c1.154,0,0.285,0.867,0.285,0.867s-4.904,6.51-5.588,7.193
                              C15.092,18.979,14.62,18.426,14.62,18.426z"/>
                          </svg>
                                                </div>
                                            </label>
                                            <div class="acc-form-av-btn">
                                                <div class="acc-form-av-btn__icon delete">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve">
                            <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                              c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                              C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                              s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                          </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-passport-number" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Teudat Zeut or Passport Number') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-passport-number" name="passport_number" class="acc-form-input input" value="{{ auth()->user()->passport_number }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-company-name" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Company Name') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-company-name" name="company_name" class="acc-form-input input" value="{{ auth()->user()->company_name }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-email" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Email Address') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-email" name="email" class="acc-form-input input" value="{{ auth()->user()->email }}" disabled>
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-company-reg-num" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Company Registration Number') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-company-reg-num" name="company_number" class="acc-form-input input" placeholder="497-945-75" value="{{ auth()->user()->company_number }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-personal-information-phone" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Phone number') }}</div>
                                    </label>
                                    <input type="text" id="account-personal-information-phone" name="phone" class="acc-form-input input input-phone-english" placeholder="+1" value="{{ auth()->user()->phone }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="complany-reg-num" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Country') }}</div>
                                    </label>
                                    <div class="acc-form-dd input dd select" data-input="account-personal-information-country">
                                        <div class="acc-form-dd-selected selected" data-selected="USA">USA</div>
                                        <div class="acc-form-dd__arrow">▾</div>

                                        <ul class="acc-form-dd-list dd-list">
                                            @foreach(config('enum.country') as $country)
                                                <li data-value="{{ $country['id'] }}">{{ $country['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <input id="account-personal-information-country" type="hidden" name="country_id" value="{{ auth()->user()->country_id }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <button type="submit" class="acc-form-btn form-btn">
                            <div class="acc-form-btn__icon form-btn__icon">
                                <img src="/storage/images/btn-download.png" alt="save">
                            </div>
                            <div class="acc-form-btn__text form-btn__text">{{ __('Save changes') }}</div>
                        </button>
                    </form>
                </div>
                <div class="profile step2 step-container" data-step="2">
                    <div class="profile-h">
                        <a href="#" class="profile-link step-btn-prev">
                            <span> << {{ __('Previous page') }}</span>
                            <span class="_red">{{ __('Personal Information') }}</span>
                        </a>
                        <a href="#" class="profile-link step-btn-next">
                            <span>{{ __('Next page') }}</span>
                            <span class="_red">{{ __('Entrance') }} >></span>
                        </a>
                    </div>
                    <form id="account-address" action="{{ route('account.update.address') }}" method="post" class="acc-form form">
                        @csrf

                        <h2 class="acc-form-title">{{ __('Address') }}</h2>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-address-house" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('House Number') }}</div>
                                    </label>
                                    <input type="text" id="account-address-house" name="address_house" class="acc-form-input input" value="{{ auth()->user()->address_house }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-address-city" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('City') }}</div>
                                    </label>
                                    <input type="text" id="account-address-city" name="address_city" class="acc-form-input input" value="{{ auth()->user()->address_city }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-address-street" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Street') }}</div>
                                    </label>
                                    <input type="text" id="account-address-street" name="address_street" class="acc-form-input input" value="{{ auth()->user()->address_street }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-address-index" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Index') }}</div>
                                    </label>
                                    <input type="text" id="account-address-index" name="address_index" class="acc-form-input input" value="{{ auth()->user()->address_index }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <button type="submit" class="acc-form-btn form-btn">
                            <div class="acc-form-btn__icon form-btn__icon">
                                <img src="/storage/images/btn-download.png" alt="save">
                            </div>
                            <div class="acc-form-btn__text form-btn__text">{{ __('Save changes') }}</div>
                        </button>
                    </form>
                </div>
                <div class="profile step3 step-container" data-step="3">
                    <div class="profile-h">
                        <a href="#" class="profile-link step-btn-prev">
                            <span> << {{ __('Previous page') }}</span>
                            <span class="_red">{{ __('Address') }}</span>
                        </a>
                    </div>
                    <form id="account-entrance" action="{{ route('account.update.entrance') }}" method="post" class="acc-form form">
                        @csrf

                        <h2 class="acc-form-title">{{ __('Entrance') }}</h2>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-entrance-code" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Entrance Code') }}</div>
                                    </label>
                                    <input type="text" id="account-entrance-code" name="entrance_code" class="acc-form-input input" value="{{ auth()->user()->entrance_code }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-entrance-floor" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Floor') }}</div>
                                    </label>
                                    <input type="text" id="account-entrance-floor" name="entrance_floor" class="acc-form-input input" value="{{ auth()->user()->entrance_floor }}">
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <div class="acc-form-row">
                            <div class="acc-form-g">
                                <div class="acc-form-item form-item">
                                    <label for="account-entrance-apartment" class="acc-form-label form-label">
                                        <div class="acc-form-label__text form-label__text">{{ __('Apartment number') }}</div>
                                    </label>
                                    <input type="text" id="account-entrance-apartment" name="entrance_apartment" class="acc-form-input input" value="{{ auth()->user()->entrance_apartment }}">
                                </div><!-- /.form-item -->
                            </div>
                            <div class="acc-form-g acc-form-checkbox__wrapper">
                                <div class="acc-form-item checkbox acc-form-checkbox form-item">
                                    <label>
                                        <input type="checkbox" class="checkbox-input" name="entrance_elevator" {{ auth()->user()->entrance_elevator ? 'checked' : '' }} value="1">
                                        <div class="checkbox-switch">
                                            <div class="checkbox-switch-icon"></div>
                                        </div>
                                        <div class="acc-form-checkbox__text">{{ __('Elevator') }}</div>
                                    </label>
                                </div><!-- /.form-item -->
                            </div>
                        </div>
                        <button type="submit" class="acc-form-btn form-btn">
                            <div class="acc-form-btn__icon form-btn__icon">
                                <img src="/storage/images/btn-download.png" alt="save">
                            </div>
                            <div class="acc-form-btn__text form-btn__text">{{ __('Save changes') }}</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@once
    @push('scripts')
        <script>
            let $formAccountPersonalInformation = $('#account-personal-information');
            let $formAccountAddress = $('#account-address');
            let $formAccountEntrance = $('#account-entrance');

            $formAccountPersonalInformation.submit(function(e) {
                let $form = $(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    dataType: 'json',
                    data: $(this).serializeArray(),

                    beforeSend: function() {
                        $form.find('.field-error').remove();
                    },

                    success: function(response) {
                        $(document).find('.acc-prof-name').text($form.find('[name="first_name"]').val() + ' ' + $form.find('[name="last_name"]').val());

                        alert(response.message);
                    },

                    error: function (error) {
                        $.each(error.responseJSON.errors, function(filed, errors) {
                            $form.find('[name="' + filed + '"] + .field-error').remove();
                            $form.find('[name="' + filed + '"]').after('<div class="field-error"></div');

                            $.each(errors, function(index, error_text) {
                                $form.find('[name="' + filed + '"] + .field-error').append('<div class="mt-5 text-red">' + error_text + '</div>');
                            });
                        });
                    }
                });

                return false;
            });

            $formAccountAddress.submit(function(e) {
                let $form = $(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    dataType: 'json',
                    data: $(this).serializeArray(),

                    beforeSend: function() {
                        $form.find('.field-error').remove();
                    },

                    success: function(response) {
                        alert(response.message);
                    },

                    error: function (error) {
                        $.each(error.responseJSON.errors, function(filed, errors) {
                            $form.find('[name="' + filed + '"] + .field-error').remove();
                            $form.find('[name="' + filed + '"]').after('<div class="field-error"></div');

                            $.each(errors, function(index, error_text) {
                                $form.find('[name="' + filed + '"] + .field-error').append('<div class="mt-5 text-red">' + error_text + '</div>');
                            });
                        });
                    }
                });

                return false;
            });

            $formAccountEntrance.submit(function(e) {
                let $form = $(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    dataType: 'json',
                    data: $(this).serializeArray(),

                    beforeSend: function() {
                        $form.find('.field-error').remove();
                    },

                    success: function(response) {
                        alert(response.message);
                    },

                    error: function (error) {
                        $.each(error.responseJSON.errors, function(filed, errors) {
                            $form.find('[name="' + filed + '"] + .field-error').remove();
                            $form.find('[name="' + filed + '"]').after('<div class="field-error"></div');

                            $.each(errors, function(index, error_text) {
                                $form.find('[name="' + filed + '"] + .field-error').append('<div class="mt-5 text-red">' + error_text + '</div>');
                            });
                        });
                    }
                });

                return false;
            });

            $(document).ready(function() {
                // $formAccountPersonalInformation.find('[name="phone"]').focus().blur();
            });
        </script>
    @endpush
@endonce

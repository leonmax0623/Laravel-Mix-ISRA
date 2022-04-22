@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="ms">
        <div class="container">
            <div class="swiper-container ms-slider">
                <div class="swiper-wrapper">
                    @foreach(settings()->get('pages_home_slider') as $slide)
                        @if((isset($slide['title'][app()->getLocale()]) || isset($slide['text'][app()->getLocale()])) && !empty(isset($slide['title'][app()->getLocale()])) || !empty(isset($slide['text'][app()->getLocale()])))
                            <div class="swiper-slide">
                                @if(isset($slide['title'][app()->getLocale()]))
                                    <h1 class="ms-title">{{ $slide['title'][app()->getLocale()] }}</h1>
                                @endif

                                @if(isset($slide['text'][app()->getLocale()]))
                                    @foreach(explode(PHP_EOL, $slide['text'][app()->getLocale()]) as $line)
                                        @if(empty($line))
                                            <p class="ms-p _mb"></p>
                                        @else
                                            <p class="ms-p">{{ $line }}</p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-pagination ms-pagination"></div>
                <div class="ms-link__wrapper">
                    @if(settings()->get('contacts_phone'))
                        <a href="tel:{{ preg_replace('/[^0-9]/', '', settings()->get('contacts_phone')) }}" class="ms-link">
                        <div class="ms-link-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512.009 512.009" style="enable-background:new 0 0 512.009 512.009;" xml:space="preserve">
                    <path d="M394.792,220.234c-9.292-17.417-27.333-28.229-47.063-28.229H164.271c-19.729,0-37.771,10.813-47.063,28.229
                      l-68.271,128.01c-4.104,7.708-6.271,16.385-6.271,25.094v74.667c0,23.531,19.146,42.667,42.667,42.667h341.333
                      c23.521,0,42.667-19.135,42.667-42.667v-74.667c0-8.708-2.167-17.385-6.271-25.104L394.792,220.234z M448,448.004
                      c0,11.76-9.563,21.333-21.333,21.333H85.333c-11.771,0-21.333-9.573-21.333-21.333v-74.667c0-5.219,1.313-10.438,3.771-15.063
                      l68.271-128c5.563-10.448,16.396-16.938,28.229-16.938h183.458c11.833,0,22.667,6.49,28.229,16.938l68.271,127.99
                      c2.458,4.635,3.771,9.854,3.771,15.073V448.004z"/>
                                <circle cx="191.983" cy="277.338" r="21.333"/>
                                <circle cx="191.983" cy="341.338" r="21.333"/>
                                <circle cx="191.983" cy="405.338" r="21.333"/>
                                <circle cx="256.004" cy="405.338" r="21.333"/>
                                <circle cx="319.983" cy="405.338" r="21.333"/>
                                <circle cx="256.004" cy="341.338" r="21.333"/>
                                <circle cx="319.983" cy="341.338" r="21.333"/>
                                <circle cx="256.004" cy="277.338" r="21.333"/>
                                <circle cx="319.983" cy="277.338" r="21.333"/>
                                <path d="M503.25,129.025C437.229,59.588,349.417,21.338,255.99,21.338c-93.417,0-181.229,38.25-247.24,107.688
                      C2.938,135.14,0,143.168,0,151.196c0,8.027,2.937,16.053,8.75,22.163l49.167,51.74c11.563,12.146,32.083,12.146,43.646,0
                      c16.448-17.302,35.146-31.563,55.479-42.333c10.188-5.25,16.771-16.302,16.677-26.75l7.438-56.063
                      c53.583-17.146,96.615-17.135,149.698-0.01l7.333,54.667c0,11.823,6.271,22.615,16.521,28.25
                      c20.438,10.823,39.135,25.083,55.594,42.375c5.781,6.094,13.531,9.438,21.823,9.438c8.281,0,16.031-3.344,21.813-9.427
                      l49.313-51.875c5.625-5.917,8.569-13.628,8.75-21.396C512.193,143.688,509.25,135.337,503.25,129.025z M487.792,158.661
                      l-49.313,51.885c-3.448,3.615-9.292,3.604-12.719-0.01c-18.052-18.969-38.594-34.625-60.927-46.448
                      c-3.323-1.833-5.313-5.375-5.406-10.885l-8.313-62.688c-0.531-4.01-3.292-7.375-7.115-8.688
                      c-31.115-10.656-59.406-15.979-87.781-15.979c-28.365,0-56.802,5.323-88.187,15.969c-3.844,1.302-6.615,4.677-7.146,8.698
                      l-8.406,64.094c0,3.896-2.094,7.594-5.313,9.25c-22.479,11.906-43.021,27.563-61.063,46.531
                      c-3.438,3.604-9.292,3.594-12.729,0.01l-49.167-51.74c-3.854-4.042-3.854-10.885,0-14.927
                      C86.156,78.557,168.469,42.671,255.99,42.671s169.844,35.885,231.802,101.063C491.646,147.775,491.646,154.619,487.792,158.661z"
                                />
              </svg>
                        </div>
                        <div class="ms-link-text link-arrow">{{ __('Contact us') }}</div>
                    </a>
                    @endif
                </div>
            </div><!-- ./ms-slider -->
        </div>
    </div><!-- /.main screen -->

    <div class="ftr container">
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Israstorage for Consumers') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('House Content Storage') }}</div>
                <div class="ftr-c-ex">{{ __('Personal Items Storage') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-consumers') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="Storage-by-the-Item" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Storage-by-the-Item') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('Storage in a Box') }}</div>
                <div class="ftr-c-ex">{{ __('Bulky Item Storage') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-consumers') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="Valet Storage" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Valet Storage') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('Rent-a-Box for Moving') }}</div>
                <div class="ftr-c-ex">{{ __('Small Moving to Storage') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-consumers') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="Israstorage for Business" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Israstorage for Business') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('Goods Storage') }}</div>
                <div class="ftr-c-ex">{{ __('Office Storage') }}</div>
                <div class="ftr-c-ex">{{ __('Archive Storage') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-business') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="Storage-by-Cubic-Meter" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Storage-by-Cubic-Meter') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('Storage-by-Pallet') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-business') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
        <div class="ftr-c">
            <div class="ftr-c-h">
                <img src="/storage/images/features-card-icon.png" alt="Logistic Services" class="ftr-c-icon">
                <h3 class="ftr-c-title">{{ __('Logistic Services') }}</h3>
            </div>
            <div class="ftr-c-ex__wrapper">
                <div class="ftr-c-ex">{{ __('Order Fulfillment') }}</div>
                <div class="ftr-c-ex">{{ __('Deliveries') }}</div>
            </div>
            <p class="ftr-c-desc">{{ __('The opposite view implies that the shareholders of the companies only add to the factional differences and are called to account.') }}</p>
            <a href="{{ route('information.for-business') }}" class="ftr-c-link link-arrow">{{ __('More detailed') }}</a>
        </div><!-- /.features-card -->
    </div><!-- /.features -->

    <div class="ab container">
        <div class="ab-prew">
            <h2 class="ab-title">{{ __('About our warehouse') }}</h2>
            <div class="ab-subtitle">{{ __('Information about our advantages') }}</div>
            <img src="/storage/images/warehouse.png" alt="warehouse" class="ab-photo">
        </div>
        <div class="ab-info">
            <div class="ab-item">
                <img src="/storage/images/CCTV.png" alt="{{ __('Reliability') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Reliability') }}</div>
                    <div class="ab-item-subtitle">{{ __('Our warehouse is under surveillance 24/7/365') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/Fire_Extinction.png" alt="{{ __('Fire safety') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Fire safety') }}</div>
                    <div class="ab-item-subtitle">{{ __('Reliable file alarm system') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/Air Circullation.png" alt="{{ __('Air circulation') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Air circulation') }}</div>
                    <div class="ab-item-subtitle">{{ __('Our warehouse is equipped with a ventilation system') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/Mouse.png" alt="{{ __('Free from rodents') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Free from rodents') }}</div>
                    <div class="ab-item-subtitle">{{ __('We carry out weekly processing') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/Sanitation.png" alt="{{ __('Free from insects') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Free from insects') }}</div>
                    <div class="ab-item-subtitle">{{ __('Not a single one was seen closer than 100 meters from our warehouse') }}</div>
                </div>
            </div><!-- about-item -->
        </div>
    </div><!-- /.about -->

    <div class="fb">
        <div class="container">
            <div class="fb-h">
                <img src="/storage/images/send-message-icon.png" alt="send message" class="fb-h__icon">
                <h2 class="fb-h__title">{{ __('Leave us a message and we will get back to you') }}</h2>
            </div>
            <div class="fb__inner">
                <div class="fb-form__wrapper">
                    <form id="form-feedback" class="fb-form" action="{{ route('request.feedback') }}" method="post">
                        @csrf

                        <div class="fb-form__row">
                            <div class="fb-form-item">
                                <label class="fb-form__label">{{ __('Phone number') }}</label>
                                <input type="tel" class="fb-form__input input" name="phone" placeholder="+1">
                            </div>
                            <div class="fb-form-item">
                                <label class="fb-form__label">{{ __('E-mail') }}</label>
                                <input type="email" class="fb-form__input input" name="email">
                            </div>
                            <div class="fb-form-item">
                                <label class="fb-form__label">{{ __('Full name') }}</label>
                                <input type="text" class="fb-form__input input" name="name">
                            </div>
                        </div>

                        <textarea class="fb-form__textarea" name="text" placeholder="{{ __('Write a message') }}"></textarea>
                    </form>
                </div>

                <div class="fb-info">
                    @foreach(\App\Models\Branch::all() as $branch)
                        <div class="fb-info-item">
                            <img src="/storage/images/geo-icon.png" alt="address" class="fb-info__icon">
                            <address class="fb-info__data">{{ $branch->address }}</address>
                        </div>
                    @endforeach

                    <a href="{{ route('information.contacts') }}" class="fb-link-map">
                        <img src="/storage/images/map-icon.png" alt="map" class="fb-link-map__icon">
                        <div class="fb-link-map__text link-arrow">{{ __('View on map') }}</div>
                    </a>
                    <div class="fb-info-group">
                        @if(settings()->has('contacts_phone'))
                            <a href="tel:077360999" class="fb-info-item">
                                <img src="/storage/images/phone-icon.png" alt="phone" class="fb-info__icon">
                                <div class="fb-info__data">
                                    <span class="_light">{{ __('Telephone') }}: </span>
                                    {{ settings()->get('contacts_phone') }}
                                </div>
                            </a>
                        @endif

                        @if(settings()->has('contacts_email'))
                                <a href="mailto:{{ settings()->get('contacts_email') }}" class="fb-info-item">
                                    <img src="/storage/images/email-icon.png" alt="email" class="fb-info__icon">
                                    <div class="fb-info__data">
                                        <span class="_light">{{ __('Mail') }}: </span>
                                        {{ settings()->get('contacts_email') }}
                                    </div>
                                </a>
                        @endif
                    </div><!-- ./fb-info-group -->
                    <div class="fb-info-item">
                        <img src="/storage/images/phone-icon.png" alt="phone" class="fb-info__icon">
                        <div class="fb-info__data">
                            <span class="_light">{{ __('Opening hours') }}: </span>
                            {{ __('Sunday') }} - {{ __('Thursday') }} | 09:00 - 16:30
                        </div>
                    </div>
                </div>
            </div><!-- ./feedback__inner -->
            <button type="submit" form="form-feedback" class="fb-btn">
                <img src="/storage/images/send-icon.png" alt="Send" class="fb-btn__icon">
                <div class="fb-btn__text link-arrow">{{ __('Send') }}</div>
            </button>
        </div>
    </div><!-- /.feedback -->

    @if(settings()->get('pages_home_image_gallery'))
        <div class="gl container">
            <h2 class="gl-title">{{ __('Image gallery') }}</h2>
            <div class="gl-subtitle">{{ __('Authorized persons of the company') }}</div>
            <div class="gl-slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach(settings()->get('pages_home_image_gallery') as $image)
                        <div class="swiper-slide">
                            <a href="#" class="gl-link">
{{--                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url(image_thumbnail($image, 280, 190)) }}" alt="photo" class="gl-photo">--}}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="gl-arrow-prev">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 511.991 511.991" style="enable-background:new 0 0 511.991 511.991;" xml:space="preserve">
                <path d="M153.433,255.991L381.037,18.033c4.063-4.26,3.917-11.01-0.333-15.083c-4.229-4.073-10.979-3.896-15.083,0.333
                  L130.954,248.616c-3.937,4.125-3.937,10.625,0,14.75L365.621,508.7c2.104,2.188,4.896,3.292,7.708,3.292
                  c2.646,0,5.313-0.979,7.375-2.958c4.25-4.073,4.396-10.823,0.333-15.083L153.433,255.991z"/>
            </svg>
                </div>
                <div class="gl-arrow-next">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve">
                <path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083
                  L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958
                  c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z"/>
            </svg>
                </div>
            </div>
        </div><!-- /.gallery -->
    @endif
@endsection

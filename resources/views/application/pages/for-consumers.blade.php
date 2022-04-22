@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="fs">
        <div class="fs__inner container">
            <div class="fs-photo">
                <img src="/storage/images/isra-for-consumers.png" alt="{{ __('Israstorage - storage services for individuals') }}">
            </div>
            <div class="fs-t">
                <h1 class="fs-title">{{ __('Israstorage - storage services for individuals') }}</h1>
                <p class="fs-p">
                    {{ __('Services for storing the contents of an apartment or house for short and long periods during repairs, relocation or during your absence from the country.') }}
                </p>
                <a href="{{ route('account.orders.create') }}" class="fs-link">
                    <img src="/storage/images/cart-icon.png" alt="cart" class="fs-link__icon">
                    <div class="fs-link__text link-arrow">{{ __('Order a service') }}</div>
                </a>
            </div>
        </div>
    </div><!-- /.first-screen -->

    <section class="def section">
        <h2 class="section-title">{{ __('Israstorage - storage services for individuals') }}</h2>
        <div class="section-divider"></div>
        <p class="def-p">
            {{ __('The company Israstorage offers a full range of services for renting space in warehouses for storing the contents of apartments and houses, individual oversized or oversized items, as well as for storing small items in cardboard boxes or in our reliable plastic boxes.') }}<br>
            {{ __('We also provide a number of packaging, transportation, and delivery services.') }}<br>
            {{ __('We provide places for rent for storing things and goods of any size and for any purpose, both for long and short terms.') }}<br>
            {{ __('If you want to be sure of the safety of your small or fragile things, we provide reliable plastic boxes for rent for moving purposes, as well as for their safe storage in our warehouse.') }}
        </p>
    </section>
    <!-- /.defenition -->

    <section class="srv section cons">
        <h2 class="section-title">{{ __('Our services') }}</h2>
        <div class="section-divider"></div>
        <div class="srv-b container">
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Storage of the contents of an apartment or house') }}</h3>
                    <p class="srv-c-p">
                        {{ __('Решили сделать ремонт? Или вас скоро ожидает переезд? Ваш нужен временный надежный дом только для ваших любимых вещей? У нас есть надежные склады, на которых мы присмотрим за вашими вещами. И Вы платите только за тот объем, который занимают ваши вещи. Никаких переплат.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Хранение отдельных негабаритных вещей и небольших предметов') }}</h3>
                    <p class="srv-c-p">
                        {{ __('Зарубежная командировка? Отпуск? Поездка за границу на длительное время. У Вас есть лишние вещи, которые негде оставить? А может старый стол не влезает в вашу новую квартиру? У нас Вы можете хранить любые отдельные предметы на срок от 1 месяца. Мы примем на хранение всё: от чемодана и картонной коробки до мотобайка. Можем предоставить наши фирменные пластиковые боксы вместо картонных коробок для небольших ваших вещей: это удобно и практично. И Вам не нужно арендовать целое складское помещение. Платите только за то, что храните!') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Хранение в надежных пластиковых боксах и помощь в перевозками на наши склады') }}</h3>
                    <p class="srv-c-p">
                        {{ __('Мы перевозим: мы предоставляем услуги по перевозке на наши склады. Сделайте заказ на нашем сайте, и мы привезем Вам наши боксы. Упакуйте ваши вещи, и мы заберем заполненные боксы, а также другие ваши негабаритные вещи, когда вам будет удобно.') }}<br>
                        {{ __('Мы храним: мы отвезем боксы с вашими вещами в один из наших надежных складов, где они будут в полной безопасности.') }}<br>
                        {{ __('Мы возвращаем: хотите вернуть одну или все вещи из боксов? От этого Вас отделяет лишь звонок или один клик. Мы вернем Ваши вещи или их часть по первому вашему требованию.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
        </div>
    </section><!-- /.services -->

    <section class="tps2 section container">
        <h2 class="section-title">{{ __('Types of storage and cost of services') }}</h2>
        <div class="section-divider"></div>
        <div class="tps2-b">
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Хранение в пластиковых боксах – доставка от двери до двери') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('Хранение в пластиковых боксах – доставка от двери до двери') }}<br>
                            {{ __('Размер бокса – 400х600х360 мм') }}<br>
                            {{ __('Объем бокса – 60 литров') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'от 30 шекелей за бокс в месяц (до скидок)' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Хранение единичных  и негабаритных предметов') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('Подходит для любых вещей, которые не вошли в коробку. Мы храним практически всё: и маленькие, и средние, и большие предметы. Это могут быть предметы мебели, спортивное оборудование, чемоданы, велосипеды, бытовая техника и многое другое.') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'от 50 шекелей за предмет в месяц (до скидок)' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Хранение в кубических метрах') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('платите только за тот объем, который храните') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'от 50 шекелей за метр кубический (до скидок)' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Пластиковые боксы на переезд') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('Да, да, картонные коробки – это не надежно. Мы с удовольствием предоставим наши пластиковые боксы в аренду на переезд.') }}<br>
                            {{ __('Размер бокса – 400х600х360 мм') }}<br>
                            {{ __('Объем бокса – 60 литров') }}<br>
                            {{ __('Цена Вас удивит - 1 шекель в день за бокс. Минимум 10 боксов. Минимум 10 дней. Стоимость доставки оговаривается отдельно.') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'от 1 шекеля за бокс в день' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Склад в аренду') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('Закрытое помещение на надежном складе только для ваших вещей. У нас есть ячейки 2м3 и 7м3. Для любых целей и на любой срок. Предложение ограничено в зависимости от местоположения склада.') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'от 150 и от 500 шекелей в месяц (до скидок)' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps2-c">
                <div class="tps2-c-row tps2-c-h">
                    <div class="tps2-c__icon">
                        <img src="/storage/images/features-card-icon.png" alt="box">
                    </div>
                    <div class="tps2-c-t">
                        <h3 class="tps2-c-title">{{ __('Доставка от двери до двери') }}</h3>
                        <p class="tps2-c-p">
                            {{ __('Свяжитесь с нами заранее, чтобы получить предложение. Стоимость зависит от объема, веса и количества предметов, местоположения, парковки, этажа, присутствия и размера лифта, ширины лестничного пролета, необходимости внешнего лифта (манофа)') }}
                        </p>
                    </div>
                </div>
                <div class="tps2-c-price">{{ 'по договоренности' }}</div>
                <div class="tps2-c-row tps2-c-f">
                    <a href="#" class="section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account') }}" class="section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
        </div>
    </section><!-- /.types 2 -->

    <div class="banner__wrapper">
        <div class="banner container">
            <div class="banner__inner">
                <div class="banner-contacts">
                    <p>{{ __('Didn\'t find what you were looking for? We will be glad to hear from you') }}</p>
                    <p><strong>{{ __('Our phone number: :phone', ['phone' => settings()->get('contacts_phone')]) }}</strong></p>
                </div>
                <a href="{{ route('information.contacts') }}" class="banner-link link-arrow">{{ __('Go to the "Contacts" page') }}</a>
            </div>
        </div>
    </div><!-- /.banner -->

    <section class="action section">
        <h2 class="section-title">{{ __('Israstorage Action') }}</h2>
        <div class="section-divider"></div>
        <div class="action-player">
            <iframe src="https://www.youtube.com/embed/BHACKCNDMW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </section><!-- /.action -->

    <section class="why section container">
        <h2 class="section-title">{{ __('Why Israstorage') }}</h2>
        <div class="section-divider"></div>
        <div class="why-c">
            <div class="why-c-image">
                <img src="/storage/images/why-image.png" alt="image">
            </div>
            <div class="why-c-t">
                <h3 class="why-c-title">{{ __('Features of our services - High-quality storage and logistics services') }}</h3>
                <p class="why-c-p">
                    {{ __('We do not limit you to one type of storage. Use our services that are convenient and suitable for you. We offer our customers all types of warehouse services, including piece processing of goods. Convenience – You choose the time of delivery, transportation and return of your belongings. If necessary, we are ready to provide packaging materials. Each client is provided with a personal manager-curator.') }}
                </p>
            </div>
        </div><!-- /.why-card -->
        <div class="why-c">
            <div class="why-c-image">
                <img src="/storage/images/why-image.png" alt="image">
            </div>
            <div class="why-c-t">
                <h3 class="why-c-title">{{ __('Features of our services - Convenient payment terms') }}</h3>
                <p class="why-c-p">
                    {{ __('The guarantee of the agreed price for the entire shelf life (but not more than 1 year). We do not require any deposits. The cost of responsible storage services is assigned individually. Payment by bank transfer or credit card. Each of our boxes and items is insured.') }}
                </p>
            </div>
        </div><!-- /.why-card -->
        <div class="why-c">
            <div class="why-c-image">
                <img src="/storage/images/why-image.png" alt="image">
            </div>
            <div class="why-c-t">
                <h3 class="why-c-title">{{ __('Features of our services - Reliable warehouses and qualified personnel') }}</h3>
                <p class="why-c-p">
                    {{ __('All our warehouses are located in concrete buildings in iconic business parks! Our qualified staff is always in touch with customers.') }}
                </p>
            </div>
        </div><!-- /.why-card -->
        <a href="{{ route('information.calculator') }}" class="why-link section-link">
            <div class="section-link__icon">
                <img src="/storage/images/calc-icon.png" alt="calculator">
            </div>
            <div class="why-link__text">{{ __('get quotation') }}</div>
        </a>
    </section><!-- /.why -->

    <div class="ab container">
        <div class="ab-prew">
            <h2 class="ab-title">{{ __('About our warehouse') }}</h2>
            <div class="ab-subtitle">{{ __('Information about our advantages') }}</div>
            <img src="/storage/images/warehouse.png" alt="warehouse" class="ab-photo">
        </div>
        <div class="ab-info">
            <div class="ab-item">
                <img src="/storage/images/fire-safety-icon.png" alt="{{ __('Reliability') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Reliability') }}</div>
                    <div class="ab-item-subtitle">{{ __('Our warehouses are under video surveillance and equipped with alarm systems 24/7. There are no visitors or strangers in our warehouses.') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/fire-safety-icon.png" alt="{{ __('Fire safety') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Fire safety') }}</div>
                    <div class="ab-item-subtitle">{{ __('Reliable file alarm system') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/fire-safety-icon.png" alt="{{ __('Air circulation') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Air circulation') }}</div>
                    <div class="ab-item-subtitle">{{ __('Our warehouse is equipped with a ventilation system') }}</div>
                </div>
            </div><!-- about-item -->
            <div class="ab-item">
                <img src="/storage/images/fire-safety-icon.png" alt="{{ __('Free from rodents and insects') }}" class="ab-item-icon">
                <div class="ab-item-text">
                    <div class="ab-item-title">{{ __('Free from rodents and insects') }}</div>
                    <div class="ab-item-subtitle">{{ __('Not a single one has been seen closer than 100 meters from our warehouses. We carry out annual processing of premises') }}</div>
                </div>
            </div><!-- about-item -->
        </div>
    </div><!-- /.about -->

    @if(!empty(settings()->get('pages_testimonials')))
        <section class="rec section container">
            <h2 class="section-title">{{ __('Testimonials') }}</h2>
            <div class="section-subtitle">{{ __('Authorized persons of the company') }}</div>
            <div class="section-divider"></div>
            <div class="rec-slider__wrapper">
                <div class="rec-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach(settings()->get('pages_testimonials') as $testimonial)
                            <div class="swiper-slide rec-item">
                                <div class="rec-photo">
                                    @if(isset($testimonial['image']) && !empty($testimonial['image']))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url(image_thumbnail($testimonial['image'], 90, 90)) }}" alt="photo">
                                    @else
                                        <img src="/storage/images/rec-photo.png" alt="photo">
                                    @endif
                                </div>

                                <div class="rec-t">
                                    <div class="rec-row">
                                        <div class="rec-name">{{ $testimonial['fullname'][app()->getLocale()] }}</div>
                                        <div class="rec-date">{{ date('d.m.Y', strtotime($testimonial['date'])) }}</div>
                                    </div>
                                    <p class="rec-p">
                                        {{ $testimonial['testimonial'][app()->getLocale()] }}
                                    </p>
                                </div>
                            </div><!-- ./rec-item -->
                        @endforeach
                    </div>
                    <div class="rec-pagination swiper-pagination"></div>
                </div>
                <div class="rec-slider-arrow-prev">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 511.991 511.991" style="enable-background:new 0 0 511.991 511.991;" xml:space="preserve">
                <path d="M153.433,255.991L381.037,18.033c4.063-4.26,3.917-11.01-0.333-15.083c-4.229-4.073-10.979-3.896-15.083,0.333
                  L130.954,248.616c-3.937,4.125-3.937,10.625,0,14.75L365.621,508.7c2.104,2.188,4.896,3.292,7.708,3.292
                  c2.646,0,5.313-0.979,7.375-2.958c4.25-4.073,4.396-10.823,0.333-15.083L153.433,255.991z"/>
            </svg>
                </div>
                <div class="rec-slider-arrow-next">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve">
                <path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083
                  L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958
                  c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z"/>
            </svg>
                </div>
            </div>
        </section><!-- /.recommedaiton -->
    @endif

    <section class="branches section container">
        <h2 class="section-title">{{ __('Out Branches') }}</h2>
        <div class="section-subtitle">{{ __('Authorized persons of the company') }}</div>
        <div class="section-divider"></div>
        <div class="cnt__inner">
            @foreach(\App\Models\Branch::all() as $branch)
                <div class="cnt-c">
                    <div class="cnt-c-info">
                        <h2 class="cnt-c-title">{{ $branch->name }}</h2>
                        <address class="cnt-c-address">{{ $branch->address }}</address>
                    </div><!-- /.cnt-c-info -->
                    <div class="cnt-c-map__wrapper">
                        <div class="cnt-c-map">
                            <iframe src="{{ $branch->map_google_url }}" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div><!-- /.contacts-card -->
            @endforeach
        </div>
    </section>
@endsection

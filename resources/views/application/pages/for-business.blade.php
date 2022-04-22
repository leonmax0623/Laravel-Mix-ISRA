@extends('layout.application')

@push('scripts')
    <script src="/js/sliders.js"></script>
@endpush

@section('main')
    <div class="fs">
        <div class="fs__inner container">
            <div class="fs-photo">
                <img src="/storage/images/isra-for-buisness.png" alt="Israstorage for buisness">
            </div>
            <div class="fs-t">
                <h1 class="fs-title">{{ __('ISRASTORAGE - STORAGE AND LOGISTICS SERVICES FOR BUSINESSES') }}</h1>
                <p class="fs-p">
                    {{ __('Warehouse premises for rent, storage and logistics services for any business for any purpose for any period, including storage, sorting, packaging, labeling and cargo delivery services.') }}
                </p>
                <a href="{{ route('account') }}" class="fs-link">
                    <img src="/storage/images/cart-icon.png" alt="cart" class="fs-link__icon">
                    <div class="fs-link__text link-arrow">{{ __('Make an order') }}</div>
                </a>
            </div>
        </div>
    </div><!-- /.first-screen -->

    <div class="partners">
        <img src="/storage/images/partners.png" alt="partnets" class="partners-image">
    </div><!-- /.partners -->

    <section class="def section">
        <h2 class="section-title">{{ __('ISRASTORAGE - warehouse premises for rent for businesses') }}</h2>
        <div class="section-divider"></div>
        <p class="def-p">
            {{ __('The company Israstorage offers flexible solutions for businesses in the organization of storage of goods, equipment, office equipment and furniture, archives and much more.') }}
        </p>
        <p class="def-p">
            {{ __('Are you the owner of an online store? We offer a full range of storage and logistics services for businesses of any size. We are ready to unload and accept your goods, carry out its acceptance, complete orders of any complexity, labeling and, of course, delivery to the final buyer. We have enough experience in storing various goods and cargo, so we provide services at a high professional level. You will not have to organize your own warehouse management. We will do all the work, giving you the opportunity to deal with more important issues.') }}
        </p>
        <p class="def-p">
            {{ __('Is your office going to move? If there is a need for temporary or long-term storage of equipment or furniture due to office relocation, reorganization of the company, repair of premises, we will take your property for storage. We will deliver it to a dry, warm room without odors, fungi or mold. We will ensure its complete safety. And if suddenly you have accumulated a lot of accounting folders that have nowhere to go, we will provide our plastic boxes for storing your archives or we will accept folders in standard cardboard boxes for storage.') }}
        </p>
    </section>
    <!-- /.defenition -->

    <section class="srv section">
        <h2 class="section-title">{{ __('Our services') }}</h2>
        <div class="section-divider"></div>
        <div class="srv-b container">
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Warehouse premises for rent') }}</h3>
                    <p class="srv-c-p">
                        {{ __('Storage services for your business: depending on the needs of your business, you can always choose the storage option that is suitable for the needs of your company.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Storage of office furniture and appliances') }}</h3>
                    <p class="srv-c-p">
                        {{ __('Storage of furniture and office equipment is a great option for the time of office relocation or repair. No deposits and overpayments. You only pay for what you keep.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Logistics Services') }}</h3>
                    <p class="srv-c-p">
                        {{ __('We offer a wide range of logistics services of any complexity, including the formation of orders, acceptance of goods and cargo, packaging, delivery to customers.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
            <div class="srv-c__wrapper">
                <div class="srv-c">
                    <div class="srv-c-photo"></div>
                    <h3 class="srv-c-title">{{ __('Archive Storage') }}</h3>
                    <p class="srv-c-p">
                        {{ __('We will carefully preserve archival documentation, books or advertising materials (posters, banners, etc.) in reliable plastic boxes or in cardboard boxes. And if you need any of your documents, only a call or one click separates you from this. We will bring you the box with the documents you need at your first request.') }}
                    </p>
                    <a href="#" class="srv-c__more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="section-link srv-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div><!-- service-card -->
        </div>
    </section>
    <!-- /.services -->

    <section class="tps section container">
        <h2 class="section-title">{{ __('The cost of our storage services') }}</h2>
        <div class="section-divider"></div>
        <div class="tps-b">
            <div class="tps-c">
                <div class="tps-c-h">
                    <img src="/storage/images/features-card-icon.png" alt="Storage-by-Cubic-Mete" class="tps-c-h__icon">
                    <h3 class="tps-c-title">{{ __('Storage-by-Cubic-Meter') }}</h3>
                </div>
                <p class="tps-c-p">
                    {{ __('from 50 shekels/cubic meter/ per month (before discounts)') }}
                </p>
                <div class="tps-c-row">
                    <a href="#" class="tps-more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="tps-link section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
            <div class="tps-c">
                <div class="tps-c-h">
                    <img src="/storage/images/features-card-icon.png" alt="Storage-by-Cubic-Mete" class="tps-c-h__icon">
                    <h3 class="tps-c-title">{{ __('Storage on pallets') }}</h3>
                </div>
                <p class="tps-c-p">
                    {{ __('from 100 shekels per pallet per month (before discounts)') }}
                </p>
                <div class="tps-c-row">
                    <a href="#" class="tps-more section-more link-arrow">{{ __('More detailed') }}</a>
                    <a href="{{ route('account.orders.create') }}" class="tps-link section-link link-arrow">{{ __('to order') }}</a>
                </div>
            </div>
        </div>
    </section><!-- ./types -->

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

    <section class="branches section container">
        <h2 class="section-title">{{ __('Our Branches') }}</h2>
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

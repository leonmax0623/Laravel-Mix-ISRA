@extends('layout.application')

@section('main')
    <div class="cnt container">
        <div class="cnt-h">
            <img src="/storage/images/contacts-icon.png" alt="geo position" class="cnt-h__icon">
            <h1 class="cnt-h__title">{{ __('Our Branches and Company Information') }}</h1>
        </div>
        <div class="cnt__inner">
            @foreach(\App\Models\Branch::all() as $branch)
                <div class="cnt-c">
                    <div class="cnt-c-info">
                        <h2 class="cnt-c-title">{{ $branch->name }}</h2>
                        <address class="cnt-c-address">{{ $branch->address }}</address>
                        @if($branch->service_area)
                            <div class="cnt-c__row">
                                <div class="cnt-c-list">
                                    <div class="cnt-c-list__title">{{ __('Service area') }}: </div>
                                    <ul>
                                        @foreach(explode(',', $branch->service_area) as $area)
                                            <li>{{ $area }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#" class="cnt-c-link link-arrow">{{ __('More Details') }}</a>
                            </div>
                        @endif
                    </div><!-- /.cnt-c-info -->
                    <div class="cnt-c-map__wrapper">
                        <div class="cnt-c-map">
                            <iframe src="{{ $branch->map_google_url }}" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div><!-- /.contacts-card -->
            @endforeach

            <div class="cnt-sc">
                <div class="cnt-sc-h">
                    <h2 class="cnt-sc-h__title">{{ __('Israstorage Ltd. - Company Information') }}</h2>
                </div>
                <div class="cnt-sc-b">
                    @if(settings()->has('contacts_legal_address_description.' . app()->getLocale()))
                        <div class="cnt-sc-desc">{!! nl2br(settings()->get('contacts_legal_address_description.' . app()->getLocale())) !!}</div>
                        <div class="cnt-sc__divider"></div>
                    @endif

                        @if(settings()->has('contacts_phone'))
                            <div class="cnt-sc-row">
                                <div class="cnt-sc-label">{{ __('Phone Number') }}:</div>
                                <div class="cnt-sc-data">{{ settings()->get('contacts_phone') }}</div>
                            </div>
                        @endif

                    @if(settings()->has('contacts_legal_address_registration_number.' . app()->getLocale()))
                        <div class="cnt-sc-row">
                            <div class="cnt-sc-label">{{ __('Company Registration Number') }}:</div>
                            <div class="cnt-sc-data">{{ settings()->get('contacts_legal_address_registration_number.' . app()->getLocale()) }}</div>
                        </div>
                    @endif

                    @if(settings()->has('contacts_legal_address_address.' . app()->getLocale()))
                        <div class="cnt-sc-row">
                            <div class="cnt-sc-label">{{ __('Address') }}:</div>
                            <div class="cnt-sc-data">{{ settings()->get('contacts_legal_address_address.' . app()->getLocale()) }}</div>
                        </div>
                    @endif
                </div>
            </div><!-- /.contacts-special-card -->
        </div>
    </div>
@endsection

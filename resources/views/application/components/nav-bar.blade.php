<div class="h-bottom">
    <a href="{{ route('home') }}" class="h-logo">
        <img src="/storage/images/logo.png" alt="{{ config('app.name', 'Laravel') }}">
    </a>
    <nav class="h-nav">
        <a href="{{ route('information.calculator') }}" class="h-nav-link _link">{{ __('Calculator') }}</a>
        <a href="{{ route('information.contacts') }}" class="h-nav-link _link">{{ __('Our branches') }}</a>
        <a href="{{ route('information.contacts') }}" class="h-nav-link _link">{{ __('Contacts') }}</a>
        <div class="h-nav-link dd">
            <span class="h-nav-link__text">{{ __('Our services') }}</span>
            <span class="h-nav-link__arrow">
            <span></span>
          </span>
            <ul class="h-nav-link__list dd-list">
                <li><a href="{{ route('information.for-consumers') }}">{{ __('Israstorage for Consumers') }}</a></li>
                <li><a href="{{ route('information.for-consumers') }}">{{ __('Storage-by-the-Item') }}</a></li>
                <li><a href="{{ route('information.for-consumers') }}">{{ __('Valet Storage') }}</a></li>
                <li><a href="{{ route('information.for-business') }}">{{ __('Israstorage for Business') }}</a></li>
                <li><a href="{{ route('information.for-business') }}">{{ __('Storage-by-Cubic-Meter') }}</a></li>
                <li><a href="{{ route('information.for-business') }}">{{ __('Logistic Services') }}</a></li>
            </ul>
        </div>
    </nav>
    <div class="h-bottom-bar">
        <a @if(settings()->has('contacts_phone')) href="tel:{{ preg_replace('/[^0-9]/', '', settings()->get('contacts_phone')) }}" @endif class="h-tel">
            <div class="h-tel-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 53.942 53.942" style="enable-background:new 0 0 53.942 53.942;" xml:space="preserve">
              <path d="M53.364,40.908c-2.008-3.796-8.981-7.912-9.288-8.092c-0.896-0.51-1.831-0.78-2.706-0.78c-1.301,0-2.366,0.596-3.011,1.68
              c-1.02,1.22-2.285,2.646-2.592,2.867c-2.376,1.612-4.236,1.429-6.294-0.629L17.987,24.467c-2.045-2.045-2.233-3.928-0.632-6.291
              c0.224-0.309,1.65-1.575,2.87-2.596c0.778-0.463,1.312-1.151,1.546-1.995c0.311-1.123,0.082-2.444-0.652-3.731
              c-0.173-0.296-4.291-7.27-8.085-9.277c-0.708-0.375-1.506-0.573-2.306-0.573c-1.318,0-2.558,0.514-3.49,1.445L4.7,3.986
              c-4.014,4.013-5.467,8.562-4.321,13.52c0.956,4.132,3.742,8.529,8.282,13.068l14.705,14.705c5.746,5.746,11.224,8.66,16.282,8.66
              c0,0,0,0,0.001,0c3.72,0,7.188-1.581,10.305-4.698l2.537-2.537C54.033,45.163,54.383,42.833,53.364,40.908z"/>
            </svg>
            </div>
            <div class="h-tel-block">
                @if(settings()->has('contacts_phone'))
                    <div class="h-tel-number">{{ settings()->get('contacts_phone') }}</div>
                @endif

                <div id="button-callback-request" class="h-tel-text">{{ __('Order a callback') }}</div>
            </div>
        </a>

        <a href="{{ route('account.orders.create') }}" class="h-order">
            <img src="/storage/images/order-icon.png" alt="{{ __('Make an order') }}" class="h-order-icon">
            <div class="h-order-text link-arrow">{{ __('Make an order') }}</div>
        </a>
    </div>
</div>

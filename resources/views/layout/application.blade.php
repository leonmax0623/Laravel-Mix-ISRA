<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>ISRA</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body data-dir="{{ in_array(app()->getLocale(), ['he']) ? 'rtl' : 'ltr' }}">

    <div class="sp-offer">
        <a href="#" class="sp-offer-arrow">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 511.991 511.991" style="enable-background:new 0 0 511.991 511.991;" xml:space="preserve">
              <path d="M153.433,255.991L381.037,18.033c4.063-4.26,3.917-11.01-0.333-15.083c-4.229-4.073-10.979-3.896-15.083,0.333
                L130.954,248.616c-3.937,4.125-3.937,10.625,0,14.75L365.621,508.7c2.104,2.188,4.896,3.292,7.708,3.292
                c2.646,0,5.313-0.979,7.375-2.958c4.25-4.073,4.396-10.823,0.333-15.083L153.433,255.991z"/>
          </svg>
        </a>

        <span class="sp-offer-text">Special offer for cargo transportation <span class="active-c">only today!</span></span>

        <a href="#" class="sp-offer-arrow _active">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve">
              <path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083
                L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958
                c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z"/>
          </svg>
        </a>
    </div><!-- /.sp-offer -->

    <div class="h-sm-row _h-lg-hidden">
        <a href="./main-en.html" class="h-logo">
            <img src="/storage/images/logo.png" alt="{{ config('app.name') }}">
        </a>
        <div class="menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <header class="h">
        <x-application.top-bar/>

        <x-application.nav-bar/>
    </header><!-- /.header -->

    @yield('main')

    <x-application.footer/>

    @stack('scripts')

    </body>
</html>



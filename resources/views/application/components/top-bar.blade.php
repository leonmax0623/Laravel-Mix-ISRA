<div class="h-top">
    <div class="h-top-links">
        @if(settings()->has('messengers_signal'))
            <a href="{{ settings()->get('messengers_signal') }}" class="h-top-link" target="_blank">
                <span class="h-top-link__text">Signal</span>
                <img src="/storage/images/signal-logo.svg" alt="Signal" class="h-top-link__icon">
            </a>
        @endif

        @if(settings()->has('messengers_messenger'))
            <a href="{{ settings()->get('messengers_messenger') }}" class="h-top-link" target="_blank">
                <span class="h-top-link__text">Messenger</span>
                <img src="/storage/images/messenger-logo.svg" alt="Messenger" class="h-top-link__icon">
            </a>
        @endif

        @if(settings()->has('messengers_whatsapp'))
            <a href="{{ settings()->get('messengers_whatsapp') }}" class="h-top-link" target="_blank">
                <span class="h-top-link__text">WhatsApp</span>
                <img src="/storage/images/whatsapp-logo.svg" alt="WhatsApp" class="h-top-link__icon">
            </a>
        @endif

        @if(settings()->has('messengers_viber'))
            <a href="{{ settings()->get('messengers_viber') }}" class="h-top-link" target="_blank">
                <span class="h-top-link__text">Viber</span>
                <img src="/storage/images/viber-logo.svg" alt="Viber" class="h-top-link__icon">
            </a>
        @endif

        @if(settings()->has('messengers_telegram'))
            <a href="{{ settings()->get('messengers_telegram') }}" class="h-top-link" target="_blank">
                <span class="h-top-link__text">Telegram</span>
                <img src="/storage/images/telegram-logo.svg" alt="Telegram" class="h-top-link__icon">
            </a>
        @endif
    </div>

    <div class="lang dd">
        <div class="lang-item _arrow-down">
            <div class="lang-icon">
                <img src="/storage/images/flag-{{ app()->getLocale() }}.svg" alt="{{ __(':Language language', ['language' => config('app.locales')[app()->getLocale()]]) }}">
            </div>
            <span class="lang-name">{{ config('app.locales')[app()->getLocale()] }}</span>
        </div>

        <ul class="lang-list dd-list">
            @foreach(config('app.locales') as $code => $language)
                <li>
                    <a href="{{ route('language', ['code' => $code]) }}">
                        <div class="lang-item">
                            <div class="lang-icon">
                                <img src="/storage/images/flag-{{ $code }}.svg" alt="{{ $language }}">
                            </div>
                            <span class="lang-name">{{ $language }}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="signs">
        @if(!auth()->check())
            <a href="{{ route('login') }}" class="sign">
                <div class="sign-icon">
                    <svg height="20px" viewBox="0 -10 490.66667 490" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m325.332031 251h-309.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h309.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m240 336.332031c-4.097656 0-8.191406-1.554687-11.308594-4.691406-6.25-6.25-6.25-16.382813 0-22.636719l74.027344-74.023437-74.027344-74.027344c-6.25-6.25-6.25-16.386719 0-22.636719 6.253906-6.25 16.386719-6.25 22.636719 0l85.332031 85.335938c6.25 6.25 6.25 16.382812 0 22.632812l-85.332031 85.332032c-3.136719 3.160156-7.230469 4.714843-11.328125 4.714843zm0 0"/><path d="m256 469.667969c-97.089844 0-182.804688-58.410157-218.410156-148.824219-3.242188-8.191406.808594-17.492188 9.023437-20.734375 8.191407-3.199219 17.515625.789063 20.757813 9.046875 30.742187 78.058594 104.789062 128.511719 188.628906 128.511719 111.742188 0 202.667969-90.925781 202.667969-202.667969s-90.925781-202.667969-202.667969-202.667969c-83.839844 0-157.886719 50.453125-188.628906 128.511719-3.265625 8.257812-12.566406 12.246094-20.757813 9.046875-8.214843-3.242187-12.265625-12.542969-9.023437-20.734375 35.605468-90.414062 121.320312-148.824219 218.410156-148.824219 129.386719 0 234.667969 105.28125 234.667969 234.667969s-105.28125 234.667969-234.667969 234.667969zm0 0"/></svg>
                </div>
                <div class="sign-text">{{ __('Enter') }}</div>
            </a>
            <a href="{{ route('signup') }}" class="sign">
                <div class="sign-icon">
                    <svg enable-background="new 0 0 512 512" height="20px" viewBox="0 0 512 512" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m503.22 186.828-25.041-25.041c-11.697-11.698-30.729-11.696-42.427 0l-52.745 52.745v-169.532c0-24.813-20.187-45-45-45h-293c-24.813 0-45 20.187-45 45v422c0 24.813 20.187 45 45 45h293c24.813 0 45-20.187 45-45v-119.033l120.213-118.712c11.697-11.697 11.697-30.73 0-42.427zm-179.399 177.423-45.122 21.058 21.037-45.078 111.975-111.975 24.757 24.756zm29.186 102.749c0 8.271-6.729 15-15 15h-293c-8.271 0-15-6.729-15-15v-422c0-8.271 6.729-15 15-15h293c8.271 0 15 6.729 15 15v199.532c-83.179 83.179-77.747 77.203-79.34 80.616l-39.598 84.854c-2.667 5.717-1.474 12.49 2.986 16.95 4.46 4.461 11.236 5.653 16.95 2.986l84.854-39.599c3.111-1.452 3.623-2.354 14.148-12.748zm104.806-235.067-24.89-24.89 24.043-24.043 25.033 25.049z"/><path d="m80.007 127h224c8.284 0 15-6.716 15-15s-6.716-15-15-15h-224c-8.284 0-15 6.716-15 15s6.716 15 15 15z"/><path d="m80.007 207h176c8.284 0 15-6.716 15-15s-6.716-15-15-15h-176c-8.284 0-15 6.716-15 15s6.716 15 15 15z"/><path d="m208.007 257h-128c-8.284 0-15 6.716-15 15s6.716 15 15 15h128c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/></svg>
                </div>
                <div class="sign-text">{{ __('Create an Account') }}</div>
            </a>
        @else
            <a href="{{ route('account') }}" class="sign">
                <div class="sign-icon">
                    <svg enable-background="new 0 0 512 512" height="20px" viewBox="0 0 512 512" width="20px" xmlns="http://www.w3.org/2000/svg">
                        <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                              S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                              S368.853,469.333,245.333,469.333z"></path>
                        <path d="M245.333,64c-41.173,0-74.667,33.493-74.667,74.667s33.493,74.667,74.667,74.667S320,179.84,320,138.667
                              S286.507,64,245.333,64z M245.333,192C215.936,192,192,168.064,192,138.667s23.936-53.333,53.333-53.333
                              s53.333,23.936,53.333,53.333S274.731,192,245.333,192z"></path>
                        <path d="M245.333,234.667c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667S128,379.221,128,373.333
                              C128,308.629,180.629,256,245.333,256s117.333,52.629,117.333,117.333c0,5.888,4.779,10.667,10.667,10.667
                              c5.888,0,10.667-4.779,10.667-10.667C384,296.875,321.792,234.667,245.333,234.667z"></path>
                    </svg>
                </div>
                <div class="sign-text">{{ __('Account') }}</div>
            </a>

            <form id="top-bar-logout" action="{{ route('logout') }}" method="POST">
                @csrf

                <a onclick="document.getElementById('top-bar-logout').submit();" href="#" class="sign">
                    <div class="sign-icon">
                        <svg enable-background="new 0 0 512 512" height="20px" viewBox="0 0 512 512" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="M510.371,226.517c-1.088-2.624-2.645-4.971-4.629-6.955l-63.979-63.979c-8.341-8.341-21.824-8.341-30.165,0
                      c-8.341,8.341-8.341,21.824,0,30.165l27.584,27.584h-55.168v-192C384.013,9.557,374.477,0,362.68,0H21.347
                      c-0.768,0-1.451,0.32-2.197,0.405c-1.024,0.107-1.92,0.277-2.901,0.533c-2.219,0.555-4.245,1.429-6.123,2.624
                      c-0.469,0.299-1.067,0.32-1.515,0.661C8.44,4.352,8.376,4.587,8.205,4.715C5.88,6.549,3.939,8.789,2.531,11.456
                      c-0.299,0.576-0.363,1.195-0.597,1.792c-0.683,1.621-1.429,3.2-1.685,4.992c-0.107,0.64,0.085,1.237,0.064,1.856
                      c-0.021,0.427-0.299,0.811-0.299,1.237V448c0,10.176,7.189,18.923,17.152,20.907l213.333,42.667
                      c1.387,0.299,2.795,0.427,4.181,0.427c4.885,0,9.685-1.685,13.525-4.843c4.928-4.053,7.808-10.091,7.808-16.491v-21.333H362.68
                      c11.797,0,21.333-9.557,21.333-21.333V256h55.168l-27.584,27.584c-8.341,8.341-8.341,21.824,0,30.165
                      c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251l63.979-63.979c1.984-1.984,3.541-4.331,4.629-6.955
                      C512.525,237.611,512.525,231.723,510.371,226.517z M191.373,325.184c-2.432,9.685-11.115,16.149-20.672,16.149
                      c-1.707,0-3.456-0.192-5.184-0.64l-42.667-10.667c-11.435-2.859-18.389-14.443-15.531-25.877
                      c2.837-11.413,14.379-18.432,25.856-15.509l42.667,10.667C187.277,302.165,194.232,313.749,191.373,325.184z M341.347,426.667
                      h-85.333V85.333c0-9.408-6.187-17.728-15.211-20.437l-74.091-22.229h174.635V426.667z"></path></svg>
                    </div>

                    <div class="sign-text">{{ __('Logout') }}</div>
                </a>
            </form>
        @endif
    </div>
</div>

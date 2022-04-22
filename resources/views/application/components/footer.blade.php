<div id="modal-callback" class="modal_window__inner">
    <span class="modal_window__close"></span>

    <div class="modal_window__content">
        <form id="form-modal-callback" action="{{ route('request.callback') }}" method="post">
            @csrf

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

            <div class="fb-form-item">
                <button type="submit" class="fb-btn">
                    <img src="{{ asset('/storage/images/send-icon.png') }}" alt="Send" class="fb-btn__icon">
                    <div class="fb-btn__text">{{ __('Send') }}</div>
                </button>
            </div>
        </form>
    </div>
</div>

<footer class="f container">
    <div class="f-col">
        <a href="{{ route('webpage', 'about-us') }}" class="f-link">{{ __('About us') }}</a>
        <a href="{{ route('webpage', 'how-it-works') }}" class="f-link">{{ __('How it works?') }}</a>
        <a href="{{ route('webpage', 'prices') }}" class="f-link">{{ __('Prices') }}</a>
        <a href="{{ route('webpage', 'storage-rules') }}" class="f-link">{{ __('Storage rules') }}</a>
        <a href="{{ route('information.faq') }}" class="f-link">{{ __('FAQ') }}</a>
    </div>
    <div class="f-col">
        <a href="{{ route('webpage', 'terms') }}" class="f-link">{{ __('Terms & Conditions') }}</a>
        <a href="{{ route('webpage', 'privacy') }}" class="f-link">{{ __('Privacy') }}</a>
        <a href="{{ route('blog.list') }}" class="f-link">{{ __('Blog') }}</a>
        <a href="{{ route('information.contacts') }}" class="f-link">{{ __('Contacts') }}</a>
    </div>

    <div class="f-info">
        <img class="f-logo" src="/storage/images/logo.png" alt="{{ config('app.name', 'Laravel') }}">
        <div class="f-links">
            @if(settings()->has('socials_youtube'))
                <a href="{{ settings()->get('socials_youtube') }}" class="f-info-link" target="_blank">
                    <img src="/storage/images/youtube-logo.svg" alt="YouTube" class="f-link-icon">
                </a>
            @endif
            @if(settings()->has('socials_instagram'))
                <a href="{{ settings()->get('socials_instagram') }}" class="f-info-link" target="_blank">
                    <img src="/storage/images/instagram-logo.svg" alt="Instagram" class="f-link-icon">
                </a>
            @endif
            @if(settings()->has('socials_facebook'))
                <a href="{{ settings()->get('socials_facebook') }}" class="f-info-link" target="_blank">
                    <img src="/storage/images/facebook-logo.svg" alt="Facebook" class="f-link-icon">
                </a>
            @endif
        </div>
        <div class="f-copyright">
            {{ __('Copyright © :year ISRASTORAGE. All rights reserved.', ['year' => date('Y')]) }}
        </div>
    </div>
</footer>

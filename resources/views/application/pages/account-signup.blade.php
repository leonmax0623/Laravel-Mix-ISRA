@extends('layout.application')

@section('main')
    <div class="rg">
        <div class="rg-h">
            <div class="rg-h-head">
                <div class="rg-h__icon">
                    <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m503.22 186.828-25.041-25.041c-11.697-11.698-30.729-11.696-42.427 0l-52.745 52.745v-169.532c0-24.813-20.187-45-45-45h-293c-24.813 0-45 20.187-45 45v422c0 24.813 20.187 45 45 45h293c24.813 0 45-20.187 45-45v-119.033l120.213-118.712c11.697-11.697 11.697-30.73 0-42.427zm-179.399 177.423-45.122 21.058 21.037-45.078 111.975-111.975 24.757 24.756zm29.186 102.749c0 8.271-6.729 15-15 15h-293c-8.271 0-15-6.729-15-15v-422c0-8.271 6.729-15 15-15h293c8.271 0 15 6.729 15 15v199.532c-83.179 83.179-77.747 77.203-79.34 80.616l-39.598 84.854c-2.667 5.717-1.474 12.49 2.986 16.95 4.46 4.461 11.236 5.653 16.95 2.986l84.854-39.599c3.111-1.452 3.623-2.354 14.148-12.748zm104.806-235.067-24.89-24.89 24.043-24.043 25.033 25.049z"></path><path d="m80.007 127h224c8.284 0 15-6.716 15-15s-6.716-15-15-15h-224c-8.284 0-15 6.716-15 15s6.716 15 15 15z"></path><path d="m80.007 207h176c8.284 0 15-6.716 15-15s-6.716-15-15-15h-176c-8.284 0-15 6.716-15 15s6.716 15 15 15z"></path><path d="m208.007 257h-128c-8.284 0-15 6.716-15 15s6.716 15 15 15h128c8.284 0 15-6.716 15-15s-6.716-15-15-15z"></path></svg>
                </div>
                <h1 class="rg-h__title">{{ __('New Account') }}</h1>
            </div>
            {{-- //todo Сделать подключение через сервисы. --}}
            <div class="rg-h-via">
                {{ __('Connect via') }}:
                <a href="#" class="rg-h-via__link">
                    <img src="/storage/images/gmail-icon.svg" alt="Gmail">
                </a>
                <a href="#" class="rg-h-via__link">
                    <img src="/storage/images/facebook-logo.svg" alt="Facebook">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('signup') }}" class="rg-form form">
            @csrf

            <div class="rg-form__inner">
                <div class="rg-form-item form-item">
                    <label for="full_name" class="rg-form-label form-label">
                        <div class="rg-form-label__text form-label__text">{{ __('First and Last Name') }}</div>
                    </label>
                    <input id="full_name" class="rg-form-input input" type="text" name="full_name" value="{{ old('full_name') }}" required>
                    @error('full_name')
                        <div class="mt-5 text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!-- /.login-form-item -->

                <div class="rg-form-item form-item">
                    <label for="email" class="rg-form-label form-label">
                        <div class="rg-form-label__text form-label__text">{{ __('Email Address') }}</div>
                    </label>
                    <input id="email" class="rg-form-input input" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="mt-5 text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!-- /.login-form-item -->

                <div class="rg-form-item form-item">
                    <label for="phone" class="rg-form-label form-label">
                        <div class="rg-form-label__text form-label__text">{{ __('Phone Number') }}</div>
                    </label>
                    <input id="phone" class="rg-form-input input input-phone-english" type="text" name="phone" placeholder="+1" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="mt-5 text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!-- /.login-form-item -->

                <div class="rg-form-item form-item">
                    <label for="password" class="rg-form-label form-label">
                        <div class="rg-form-label__text form-label__text">{{ __('New Password') }}</div>
                    </label>
                    <input id="password" class="rg-form-input input" type="password" name="password" required>
                    @error('password')
                        <div class="mt-5 text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!-- /.login-form-item -->

                <div class="rg-form-item form-item">
                    <label for="password_confirmation" class="rg-form-label form-label">
                        <div class="rg-form-label__text form-label__text">{{ __('Reenter Password') }}</div>
                    </label>
                    <input id="password_confirmation" class="rg-form-input input" type="password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="mt-5 text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!-- /.login-form-item -->

                <div class="rg-form-item form-item checkbox rg-form-checkbox__wrapper">
                    <label>
                        <input id="agreement" class="checkbox-input" type="checkbox" name="agreement" value="1">
                        <div class="checkbox-flag">
                            <div class="checkbox-flag-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 229.153 229.153" style="enable-background:new 0 0 229.153 229.153;" xml:space="preserve">
                  <path d="M92.356,223.549c7.41,7.5,23.914,5.014,25.691-6.779c11.056-73.217,66.378-134.985,108.243-193.189
                    C237.898,7.452,211.207-7.87,199.75,8.067C161.493,61.249,113.274,117.21,94.41,181.744
                    c-21.557-22.031-43.201-43.853-67.379-63.212c-15.312-12.265-37.215,9.343-21.738,21.737
                    C36.794,165.501,64.017,194.924,92.356,223.549z"></path>
                </svg>
                            </div>
                        </div>
                        <div class="rg-form-checkbox__text">
                            {{ __('I agree to comply with the terms and conditions of using this website and services provided by the Company.') }}
                            @error('agreement')
                                <br>
                                <span class="text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </label>
                </div>
            </div>

            <button type="submit" class="rg-form-btn form-btn">
                <div class="rg-form-btn__icon form-btn__icon">
                    <svg fill="#2B2F33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 229.153 229.153" style="enable-background:new 0 0 229.153 229.153;"
                         xml:space="preserve">
            <path d="M92.356,223.549c7.41,7.5,23.914,5.014,25.691-6.779c11.056-73.217,66.378-134.985,108.243-193.189
              C237.898,7.452,211.207-7.87,199.75,8.067C161.493,61.249,113.274,117.21,94.41,181.744
              c-21.557-22.031-43.201-43.853-67.379-63.212c-15.312-12.265-37.215,9.343-21.738,21.737
              C36.794,165.501,64.017,194.924,92.356,223.549z"/>
          </svg>
                </div>
                <div class="rg-form-btn__text form-btn__text link-arrow">{{ __('Create Account') }}</div>
            </button>
        </form>
    </div>
@endsection

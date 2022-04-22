@extends('layout.application')

@section('main')
    <div class="lgn">
        <div class="lgn-h">
            <img src="/storage/images/lock-icon.png" alt="{{ __('Personal Cabinet') }}" class="lgn-h__icon">
            <h1 class="lgn-h__title">{{ __('Personal Cabinet') }}</h1>
        </div>

        <div class="lgn-form p-0" style="margin: 0 auto">
            <x-application.notification-alert/>
        </div>

        <form method="POST" action="{{ route('login') }}" class="lgn-form form">
            @csrf

            <div class="lgn-form-item form-item">
                <label for="email" class="lgn-form-label form-label">
                    <div class="lgn-form-icon form-icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148
                  C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962
                  c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216
                  h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40
                  c59.551,0,108,48.448,108,108S315.551,256,256,256z"/>
            </svg>
                    </div>
                    <div class="lgn-form-label__text form-label__text">{{ __('Your Email Address') }}</div>
                </label>
                <input id="email" class="lgn-form-input input" type="email" name="email" required autofocus value="{{ old('email') }}">
                @error('email')
                    <div class="mt-5 text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div><!-- /.login-form-item -->
            <div class="lgn-form-item form-item">
                <label for="password" class="lgn-form-label form-label">
                    <div class="lgn-form-icon form-icon">
                        <svg enable-background="new 0 0 504.021 504.021" viewBox="0 0 504.021 504.021" xmlns="http://www.w3.org/2000/svg"><path d="m502.497 395.397c-.054-4.173-1.734-8.16-4.686-11.11l-178.339-178.34c28.804-103.234-48.443-205.947-156.577-205.947-89.891.125-162.221 72.822-162.104 162.45.141 108 103.369 184.781 206.037 156.143l37.29 37.29c3.81 3.811 9.277 5.444 14.559 4.354l27.781-5.754-6.182 26.948c-1.232 5.37.386 10.995 4.281 14.891l25.363 25.363c3.694 3.694 8.957 5.354 14.106 4.439l29.528-5.234-5.235 29.528c-.913 5.146.745 10.412 4.44 14.106l34.807 34.806c3.172 3.172 7.505 4.791 11.537 4.685l54.902-.767c27.489-.383 49.568-23.06 49.219-50.549zm-48.936 75.856-48.146.672-24.131-24.131 7.776-43.861c1.935-10.905-7.574-20.493-18.547-18.547l-43.862 7.775-13.206-13.205 9.776-42.619c2.6-11.328-7.406-21.603-18.84-19.245l-43.741 9.06-38.028-38.029c-4.34-4.34-10.781-5.814-16.569-3.799-22.812 7.935-47.365 9.387-71.011 4.194-98.998-21.731-137.18-145.919-64.331-219.173 71.954-72.355 197.474-37.43 219.697 63.808 5.189 23.645 3.739 48.198-4.195 71.009-2.016 5.795-.54 12.232 3.799 16.57l180.58 180.58.646 50.796c.126 9.867-7.799 18.007-17.667 18.145z"/><path d="m89.792 90.662c-29.125 29.123-8.213 78.827 32.66 78.827 40.886 0 61.771-49.717 32.66-78.827-18.008-18.011-47.311-18.009-65.32 0zm42.693 42.693c-5.531 5.531-14.532 5.533-20.065 0-5.532-5.532-5.533-14.534-.001-20.065 5.53-5.53 14.533-5.534 20.066-.001 5.533 5.532 5.532 14.534 0 20.066z"/></svg>
                    </div>
                    <div class="lgn-form-label__text form-label__text">{{ __('Password') }}</div>
                </label>
                <input id="password" class="lgn-form-input input" type="password" name="password">
                @error('password')
                    <div class="mt-5 text-red">
                        {{ $message }}
                    </div>
                @enderror
            </div><!-- /.login-form-item -->
            <div class="lgn-form-rec">
                {{ __('Oops! Forgot Password?') }}
                <a href="#" class="link-arrow">{{ __('Password Recovery!') }}</a>
            </div>
            <button type="submit" class="lgn-form-btn form-btn">
                <div class="lgn-form-btn__icon form-btn__icon">
                    <svg fill="#2B2F33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 229.153 229.153" style="enable-background:new 0 0 229.153 229.153;"
                         xml:space="preserve">
            <path d="M92.356,223.549c7.41,7.5,23.914,5.014,25.691-6.779c11.056-73.217,66.378-134.985,108.243-193.189
              C237.898,7.452,211.207-7.87,199.75,8.067C161.493,61.249,113.274,117.21,94.41,181.744
              c-21.557-22.031-43.201-43.853-67.379-63.212c-15.312-12.265-37.215,9.343-21.738,21.737
              C36.794,165.501,64.017,194.924,92.356,223.549z"/>
          </svg>
                </div>
                <div class="lgn-form-btn__text form-btn__text link-arrow">{{ __('Log in') }}</div>
            </button>
        </form>
    </div>
@endsection

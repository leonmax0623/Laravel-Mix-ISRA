@extends('layout.admin')

@section('main')
    <x-admin.card title="{{ __('Settings') }}">
        <x-slot name="header_tools">
            <button class="btn btn-tool text-success" type="submit" form="form-settings" data-toggle="tooltip" title="{{ __('Save') }}"><i class="fa fas fa-save"></i></button>
        </x-slot>

        <form id="form-settings" action="{{ route('admin.settings') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <x-admin.card title="{{ __('Messengers') }}">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Signal</label>
                                    <input type="text" class="form-control form-control-sm" name="messengers_signal" value="{{ settings()->get('messengers_signal') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Messenger</label>
                                    <input type="text" class="form-control form-control-sm" name="messengers_messenger" value="{{ settings()->get('messengers_messenger') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="text" class="form-control form-control-sm" name="messengers_whatsapp" value="{{ settings()->get('messengers_whatsapp') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Viber</label>
                                    <input type="text" class="form-control form-control-sm" name="messengers_viber" value="{{ settings()->get('messengers_viber') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <input type="text" class="form-control form-control-sm" name="messengers_telegram" value="{{ settings()->get('messengers_telegram') }}">
                                </div>
                            </div>
                        </div>
                    </x-admin.card>

                    <x-admin.card title="{{ __('Social networks') }}">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control form-control-sm" name="socials_youtube" value="{{ settings()->get('socials_youtube') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control form-control-sm" name="socials_instagram" value="{{ settings()->get('socials_instagram') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control form-control-sm" name="socials_facebook" value="{{ settings()->get('socials_facebook') }}">
                                </div>
                            </div>
                        </div>
                    </x-admin.card>
                </div>
                <div class="col-lg-6">
                    <x-admin.card title="{{ __('Contact details') }}">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>{{ __('Telephone') }}</label>
                                    <input type="text" class="form-control form-control-sm" name="contacts_phone" value="{{ settings()->get('contacts_phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="text" class="form-control form-control-sm" name="contacts_email" value="{{ settings()->get('contacts_email') }}">
                                </div>
                            </div>
                        </div>
                    </x-admin.card>

                    <x-admin.card title="{{ __('Legal address') }}">
                        <x-admin.tab>
                            @foreach(config('app.locales') as $code => $language)
                                <x-slot :name="'tab-' . $code" title="{{ $language }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Registration number') }}</label>
                                                <input type="text" class="form-control form-control-sm" name="contacts_legal_address_registration_number[{{ $code }}]" value="{{ settings()->get('contacts_legal_address_registration_number.' . $code) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Address') }}</label>
                                                <input type="text" class="form-control form-control-sm" name="contacts_legal_address_address[{{ $code }}]" value="{{ settings()->get('contacts_legal_address_address.' . $code) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <textarea class="form-control form-control-sm" name="contacts_legal_address_description[{{ $code }}]" rows="5">{{ settings()->get('contacts_legal_address_description.' . $code) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot>
                            @endforeach
                        </x-admin.tab>
                    </x-admin.card>
                </div>
            </div>
        </form>
    </x-admin.card>
@endsection

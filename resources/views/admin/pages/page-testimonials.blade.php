@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.pages.testimonials') }}" method="post">
        @csrf

        <x-admin.card title="{{ __('Список отзывов') }}">
            <x-admin.tab>
                @for($i = 1; $i <= 15; $i++)
                    <x-slot :name="'tab-page' . $i" title="{{ $i }}">
                        <x-admin.tab>
                            @foreach(config('app.locales') as $code => $language)
                                <x-slot :name="'tab-' . $i . '-' . $code" title="{{ $language }}">
                                    <div class="form-group">
                                        <label>{{ __('Date') }}</label>
                                        <input type="text" class="form-control form-control-sm datepicker-input" name="pages_testimonials[{{ $i }}][date]" data-toggle="datetimepicker" value="{{ settings()->get('pages_testimonials.' . $i . '.date') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Full name') }}</label>
                                        <input type="text" class="form-control" name="pages_testimonials[{{ $i }}][fullname][{{ $code }}]" value="{{ settings()->get('pages_testimonials.' . $i . '.fullname.' . $code) }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Testimonial') }}</label>
                                        <textarea class="form-control" name="pages_testimonials[{{ $i }}][testimonial][{{ $code }}]" rows="5">{{ settings()->get('pages_testimonials.' . $i . '.testimonial.' . $code) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Avatar') }}</label>
                                        <x-admin.form.input.image name="pages_testimonials[{{ $i }}][image]" value="{{ settings()->get('pages_testimonials.' . $i . '.image') }}" />
                                    </div>
                                </x-slot>
                            @endforeach
                        </x-admin.tab>
                    </x-slot>
                @endfor
            </x-admin.tab>

            <x-slot name="footer">
                {{ __('The recommended image size is :width x :height', ['width' => 90, 'height' => 90]) }}
            </x-slot>
        </x-admin.card>

        <input type="submit">
    </form>
@endsection

@push('scripts')
    <script>
        function addImageGalleryImage() {
            let $table = $('#table-image-gallery');

            let $row = $('<tr/>')
                .append($('<td/>').html(`<x-admin.form.input.image name="pages_home_image_gallery[]"/>`))
                .append($('<td/>').html('<button class="btn btn-danger" onclick="removeImageGalleryImage(this); return false;">{{ __('Remove') }}</button>'));

            $table.find('tbody').append($row);
        }

        function removeImageGalleryImage(element) {
            $(element).closest('tr').remove();
        }
    </script>
@endpush

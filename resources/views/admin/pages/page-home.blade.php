@extends('layout.admin')

@section('main')
    <form action="{{ route('admin.pages.home') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <x-admin.card title="{{ __('Slider') }}">
                    <x-admin.tab>
                        @for($i = 1; $i <= 5; $i++)
                            <x-slot :name="'tab-page' . $i" title="{{ $i }}">
                                <x-admin.tab>
                                    @foreach(config('app.locales') as $code => $language)
                                        <x-slot :name="'tab-' . $i . '-' . $code" title="{{ $language }}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="pages_home_slider[{{ $i }}][title][{{ $code }}]" value="{{ settings()->get('pages_home_slider.' . $i . '.title.' . $code) }}">
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" name="pages_home_slider[{{ $i }}][text][{{ $code }}]" rows="5">{{ settings()->get('pages_home_slider.' . $i . '.text.' . $code) }}</textarea>
                                            </div>
                                        </x-slot>
                                    @endforeach
                                </x-admin.tab>
                            </x-slot>
                        @endfor
                    </x-admin.tab>
                </x-admin.card>
            </div>

            <div class="col-lg-6">
                <x-admin.card title="{{ __('Image gallery') }}">
                    <table id="table-image-gallery" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Images') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(settings()->get('pages_home_image_gallery', []) as $image)
                                <tr>
                                    <td><x-admin.form.input.image name="pages_home_image_gallery[]" value="{{ $image }}"/></td>
                                    <td style="width: .1%"><button class="btn btn-danger" onclick="removeImageGalleryImage(this); return false;">{{ __('Remove') }}</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-right" colspan="2">
                                    <button class="btn btn-success" onclick="addImageGalleryImage(); return false;">{{ __('Add') }}</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <x-slot name="footer">
                        {{ __('The recommended image size is :width x :height', ['width' => 280, 'height' => 190]) }}
                    </x-slot>
                </x-admin.card>
            </div>
        </div>

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

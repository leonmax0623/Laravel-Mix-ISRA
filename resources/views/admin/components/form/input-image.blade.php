<div class="custom-file">
    <label class="custom-file-label" style="@if($value) display: none; @endif" data-text="Image">Select image</label>

    <input type="file" class="custom-file-input custom-file-input-image" style="@if($value) display: none; @endif" data-name="{{ $name }}">

    <div class="progress" style="position: absolute; top: 0; left: 0; right: 0; z-index: 1; height: 100%; display: none">
        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
    </div>

    <div class="btn-group btn-block" role="group" style="@if(!$value) display: none; @endif">
        <button type="button" class="btn btn-primary" data-action="view" @if($value) data-url="{{ url($url) }}" @endif>{{ __('button.view') }}</button>
        <button type="button" class="btn btn-warning" data-action="edit">{{ __('button.edit') }}</button>
        <button type="button" class="btn btn-danger" data-action="remove">{{ __('button.remove') }}</button>
    </div>

    @if($value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endif
</div>

@once
    @push('scripts')
        <script>
            $(document).on('click', '.custom-file [data-action="view"]', function(event) {
                let $this = $(this);

                if($this.attr('data-url')) {
                    window.open($this.attr('data-url'), '_blank');
                }
            });

            $(document).on('click', '.custom-file [data-action="remove"]', function(event) {
                let $this = $(this);
                let $block = $this.closest('.custom-file');
                let $label = $block.find('> label');
                let $input = $block.find('> input[type="file"]');
                let $input_hidden = $block.find('> input[type="hidden"]');
                let $btn_group = $block.find('> .btn-group');

                $block.find('[data-url]').removeAttr('data-url');
                $input.show();
                $label.show();
                $label.text($label.attr('data-text'));
                $input_hidden.remove();
                $btn_group.hide();
            });

            $(document).on('click', '.custom-file [data-action="edit"]', function(event) {
                let $this = $(this);
                let $block = $this.closest('.custom-file');
                let $input = $block.find('> input[type="file"]');

                $input.trigger('click');
            });

            $(document).on('change', 'input.custom-file-input-image', function(event) {
                let $input = $(this);
                let $block = $input.closest('.custom-file');
                let $label = $block.find('> label');
                let $progress = $block.find('> .progress > .progress-bar');
                let $btn_group = $block.find('> .btn-group');

                let $bnt_view = $btn_group.find('[data-action="view"]');
                let $bnt_edit = $btn_group.find('[data-action="edit"]');
                let $bnt_remove = $btn_group.find('[data-action="remove"]');

                let input_name = $input.attr('data-name');

                if(this.files.length > 0) {
                    $input.parent().find('label').text(this.files[0]['name']);
                } else {
                    $input.parent().find('label').text($(this).parent().find('label').attr('data-text'));
                    return;
                }

                let formData = new FormData();
                formData.append('image', $(this).prop('files')[0]);

                $.ajax({
                    url: '{{ route('admin.upload.image') }}',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        if(typeof response.url !== undefined) {
                            $block.find('input[name="' + input_name + '"]').remove();
                            $block.append($('<input/>').attr('type', 'hidden').attr('name', input_name).val(response.file));

                            $input.removeAttr('disabled');
                            $input.hide();
                            $label.hide();

                            $progress.parent().hide();
                            $progress.css('width', '0');

                            $btn_group.show();

                            $bnt_view.attr('data-url', location.origin + response.url);
                        }
                    },

                    xhr: function(){
                        let xhr = $.ajaxSettings.xhr();

                        $progress.parent().show();
                        $input.attr('disabled', 'disabled');

                        xhr.upload.onprogress = function(event) {
                            let percent = event.loaded / event.total * 100;
                            if(percent > 100) {
                                percent = 100;
                            }

                            $progress.css('width', percent + '%');
                        };

                        xhr.upload.onload = function() {
                            $input.removeAttr('disabled');

                            $progress.parent().hide();
                            $progress.css('width', '0');
                        };

                        return xhr ;
                    }
                });
            });
        </script>
    @endpush
@endonce

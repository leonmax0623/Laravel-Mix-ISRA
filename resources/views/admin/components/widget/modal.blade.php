<div class="modal fade" id="{{ $id }}">
    <div {{ $attributes->class(['modal-dialog']) }}>
        <div class="modal-content">
            @isset($header)
                <div class="modal-header">
                    {{ $header }}
                </div>
            @endisset

            <div class="modal-body {{ isset($body) ? $body->attributes->get('class', '') : '' }}">
                {{ $body ?? $slot }}
            </div>

            @isset($footer)
                <div class="modal-footer justify-content-between">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>

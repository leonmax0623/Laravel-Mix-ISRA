<div class="card" id="{{ $attributes->get('id') }}">
    <div class="card-header">
        @if($attributes->has('is-collapse'))
            <a class="card-title h3" data-toggle="collapse" aria-expanded="false" href="#collapse-{{ $component_id }}">{{ $attributes->get('title') }}</a>
        @else
            <h3 class="card-title">{{ $attributes->get('title') }}</h3>
        @endif

        @isset($header_tools)
            <div class="card-tools">
                {{ $header_tools }}
            </div>
        @endisset
    </div>
    <!-- /.card-header -->

    @if($attributes->has('is-collapse'))
        <div id="collapse-{{ $component_id }}" class="collapse {{ $attributes->get('is-collapse') === 'true' ? 'show' : '' }}">
            <div class="card-body {{ isset($body) && $body->attributes->has('class') ? $body->attributes->get('class') : '' }}">
                {{ $body ?? $slot }}
            </div>
        </div>
    @else
        <div class="card-body {{ isset($body) && $body->attributes->has('class') ? $body->attributes->get('class') : '' }}">
            {{ $body ?? $slot }}
        </div>
    @endif
    <!-- /.card-body -->

    @if($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>

<div class="alert alert-{{ $type }} alert-dismissible">
    @isset($title)
        @if($attributes->has('is-closing'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif

        <h5>
            @if($hasIcon())
                <i class="icon fas {{ $getIcon() }}"></i>
            @endif

            {{ $title }}
        </h5>
    @endisset

    {{ $slot }}
</div>

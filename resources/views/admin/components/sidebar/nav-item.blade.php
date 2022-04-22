@php($isOpen = request()->routeIs($route))

@if($isOpen)
    @foreach($route_params as $k => $v)
        @if(!request()->has($k))
            @php($isOpen = false)
            @break
        @endif

        @if(is_array($v))
            @foreach($v as $k2 => $v2)
                @if(!request()->has($k . '.' . $k2))
                    @php($isOpen = false)
                    @break(2)
                @else
                    @if(request()->input($k . '.' . $k2) != $v2)
                        @php($isOpen = false)
                        @break(2)
                    @endif
                @endif
            @endforeach
        @else
            @if(request()->input($k) !== $v)
                @php($isOpen = false)
                @break
            @endif
        @endif
    @endforeach
@endif

<li class="nav-item">
    <a href="{{ route($route, $route_params) }}" class="nav-link {{ $isOpen ? 'active' : ''}}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>{{ __($title) }}</p>
    </a>
</li>

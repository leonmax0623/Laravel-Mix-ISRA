@php($isOpen = collect($items)->pluck('route')->contains(request()->route()->getName()))

<li class="nav-item {{ $isOpen ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ __($title) }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @foreach($items as $item)
            {!! $item->render()->with($item->data()) !!}
        @endforeach
    </ul>
</li>

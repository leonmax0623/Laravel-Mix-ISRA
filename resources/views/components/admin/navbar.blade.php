<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-globe"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach(config('app.locales') as $code => $language)
                    <a href="{{ route('language', ['code' => $code]) }}" class="dropdown-item {{ $code === app()->getLocale() ? 'bg-primary' : '' }}">
                        <img style="height: 1rem; width: 1rem; margin: 0 5px;" src="/storage/images/flag-{{ $code }}.svg" alt="{{ $language }}">
                        {{ $language }}
                    </a>
                @endforeach
            </div>
        </li>
    </ul>
</nav>

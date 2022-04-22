@if($attributes->has('volume'))
    <li class="calc-list__item select-nested" data-volume="{{ $attributes->get('volume') }}">
        <div class="calc-list__label">{{ $title }}</div>

        <div class="calc-subdd dd select">
            <div class="calc-subdd__text selected">0</div>

            <div class="calc-subdd__arrow">▾</div>

            <ul class="calc-subdd-list dd-list">
                @for($i = 0; $i <= 10; $i++) <li>{{ $i }}</li> @endfor
            </ul>
        </div>
    </li>
@endif

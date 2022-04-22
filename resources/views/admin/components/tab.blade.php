@php($id = $attributes->has('id') && !empty($attributes->get('id')) ? $attributes->get('id') : str_replace('.', '-', microtime(true)))

<div id="{{ $id }}">
    <nav class="mb-2">
        <div class="nav nav-tabs" id="nav-tabs-{{ $id }}" role="tablist">
            @foreach($__laravel_slots as $slot_name => $slot_object)
                @if(mb_strpos($slot_name, 'tab-') === 0)
                    <a class="nav-item nav-link" id="nav-tabs-{{ $id }}-{{ $slot_name }}" data-toggle="tab" href="#tab-content-{{ $id }}-{{ $slot_name }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ $slot_object->attributes['title'] }}</a>
                @endif
            @endforeach
        </div>
    </nav>

    <div class="tab-content" id="tab-content-{{ $id }}">
        @foreach($__laravel_slots as $slot_name => $slot_object)
            @if(mb_strpos($slot_name, 'tab-') === 0)
                <div class="tab-pane fade" id="tab-content-{{ $id }}-{{ $slot_name }}" role="tabpanel" aria-labelledby="nav-tabs-{{ $id }}-{{ $slot_name }}">
                    {{ $slot_object }}
                </div>
            @endif
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nav-tabs-{{ $id }}').find('a.nav-item:first').click();
        });
    </script>
@endpush

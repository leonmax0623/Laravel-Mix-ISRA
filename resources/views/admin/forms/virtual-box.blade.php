<div class="form-group">
    
    @if($action == "edit")
        <label>{{ __('Name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $box->name }}">
    @endif

    @if($action == "create")
        @for ($i = 1; $i < 10; $i++)
            <label>{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name{{$i}}') is-invalid @enderror" name="name{{$i}}" value="">
        @endfor
    @endif
    
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


@if($box->exists)
    @if($box->order)
        <div class="form-group">
            <label>{{ __('Order') }}</label>
            <input type="text" class="form-control" value="#{{ $box->order->id }} ({{ $box->order->user->full_name }})" disabled>
            <a href="{{ route('admin.order.products.edit', ['id' => $box->order->id]) }}" target="_blank"><small class="form-text">{{ __('Go to Order') }}</small></a>
        </div>
    @endif
@endif

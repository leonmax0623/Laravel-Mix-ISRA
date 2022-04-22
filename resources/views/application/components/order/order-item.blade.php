<div class="on-item my-item">
    <div class="on-item-info">
        <div class="on-item-photo">
            <img src="/storage/images/order-item-1.png" alt="crate">
        </div>
        <div class="on-item-t">
            <div class="on-item-title">{{ __('ID') }} {{ $order->id }}</div>
            <div class="on-item-extrainfo">
                {{ $order->service->name }}
                <br><br>
                <b>{{ $order->created_at }}</b>
            </div>
        </div>
    </div>
    <div class="on-item-total">
        <div class="on-item-total-b">
            <div class="value">{{ __(get_enum_name('order_status', $order->order_status_id)) }}</div>
        </div>
        <div class="on-item-total__divider"></div>

        <div class="on-item-total-b">
            <div class="label">{{ __('Amount') }}:</div>
            <div class="value _red">{{ $order->invoices()->sum('amount') }} ₪</div>
        </div>
    </div>
</div>

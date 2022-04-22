@if (session('notification-alert'))
    <div class="c-notification-alert mt-10 mb-10 p-10 text-white bg-green">
        {{ session('notification-alert')['text'] }}
    </div>
@endif

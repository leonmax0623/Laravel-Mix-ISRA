<div class="row">
    <div class="{{ $callbackRequest->exists ? 'col-lg-4' : 'col-lg-12' }}">
        <form id="{{ $attributes->get('id') }}" action="{{ $attributes->get('action') }}" method="post">
            @csrf
            @method($attributes->get('method'))

            <div class="form-group">
                <label>{{ __('Full name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ $callbackRequest->name }}">
            </div>

            <div class="form-group">
                <label>{{ __('Email') }}</label>
                <input type="text" class="form-control" name="email" value="{{ $callbackRequest->email }}">
            </div>

            <div class="form-group">
                <label>{{ __('Phone') }}</label>
                <input type="text" class="form-control" name="phone" value="{{ $callbackRequest->phone }}">
            </div>

            <div class="form-group">
                <label>{{ __('Text') }}</label>
                <textarea class="form-control" name="text">{{ $callbackRequest->text }}</textarea>
            </div>

            <div class="form-group">
                <div class="btn-group btn-block btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-success {{ $callbackRequest->is_new_status ? 'active' : '' }}">
                        <input type="radio" name="status" autocomplete="off" value="0" {{ $callbackRequest->is_new_status ? 'checked' : '' }}> {{ __('New') }}
                    </label>
                    <label class="btn btn-outline-primary {{ $callbackRequest->is_processing_status ? 'active' : '' }}">
                        <input type="radio" name="status" autocomplete="off" value="1" {{ $callbackRequest->is_processing_status ? 'checked' : '' }}> {{ __('In processing') }}
                    </label>
                    <label class="btn btn-outline-danger {{ $callbackRequest->is_completed_status ? 'active' : '' }}">
                        <input type="radio" name="status" autocomplete="off" value="2" {{ $callbackRequest->is_completed_status ? 'checked' : '' }}> {{ __('Completed') }}
                    </label>
                </div>
            </div>
        </form>

        @if($callbackRequest->user)
            <div class="alert alert-primary" role="alert">
                {!! __('The request for a callback was received from a registered user: :name', ['name' => '<b><a href="' . route('admin.users.edit', $callbackRequest->user->id) . '" target="_blank">' . $callbackRequest->user->full_name . '</a></b>'])  !!}
            </div>
        @endif
    </div>

    @if($callbackRequest->exists)
        <div class="col-lg-8">
            <label>{{ __('Managers\' notes') }}</label>
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Manager') }}</th>
                        <th>{{ __('Text') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <form id="form-callback-request-note-create" action="{{ route('admin.callbacks.note', $callbackRequest->id) }}" method="post">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control" name="text" placeholder="{{ __('Text') }}" aria-label="{{ __('Text') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" type="button">{{ __('Add note') }}</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @foreach($callbackRequest->notes()->with(['user'])->orderByDesc('created_at')->get() as $callbackRequestNote)
                        <tr>
                            <td class="text-nowrap px-3" style="width: .1%">{{ $callbackRequestNote->created_at }}</td>
                            <td class="text-nowrap px-3" style="width: .1%">
                                <a href="{{ route('admin.users.edit', $callbackRequestNote->user->id) }}" target="_blank">{{ $callbackRequestNote->user->full_name }}</a>
                            </td>
                            <td class="px-3">{{ $callbackRequestNote->text }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

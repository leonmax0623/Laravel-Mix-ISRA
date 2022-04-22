<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Callbacks extends Controller {
    public function index() {
        $callbacks_requests_filter = [
            'filter_status' => request()->get('filter_status')
        ];

        $callbacks_requests = \App\Models\CallbackRequest::with(['user'])
            ->orderBy('status')
            ->orderByDesc('created_at');

        if(request()->has('filter_status')) {
            $callbacks_requests->where('status', '=', request()->get('filter_status'));
        }

        $callbacks_requests = $callbacks_requests->paginate(25);
        $callbacks_requests->appends($callbacks_requests_filter);

        return view('admin.pages.callback-request.index', [
            'callbacks_requests' => $callbacks_requests,
            'filter' => $callbacks_requests_filter
        ]);
    }

    public function create() {
        return view('admin.pages.callback-request.create');
    }

    public function store() {
        $validator = Validator::make(request()->input(), [
            'phone' => ['required_without:email'],
            'email' => ['required_without:phone'],
            'name' => ['required'],
            'text' => ['required'],
            'status' => ['required']
        ]);

        $validator->validate();

        $callbackRequest = \App\Models\CallbackRequest::create(request()->input());

        return response()->json([
            'status' => true,
            'redirect' => route('admin.callbacks.edit', $callbackRequest->id)
        ]);
    }

    public function edit(int $id) {
        $callback_request = \App\Models\CallbackRequest::findOrFail($id);

        return view('admin.pages.callback-request.edit', [
            'callback_request' => $callback_request
        ]);
    }

    public function update(int $id) {
        $callback_request = \App\Models\CallbackRequest::findOrFail($id);

        $validator = Validator::make(request()->input(), [
            'phone' => ['required_without:email'],
            'email' => ['required_without:phone'],
            'name' => ['required'],
            'text' => ['required'],
            'status' => ['required']
        ]);

        $validator->validate();

        $callback_request->update(request()->input());

        return response()->json([
            'status' => true,
            'redirect' => route('admin.callbacks.edit', $callback_request->id)
        ]);
    }

    public function destroy(int $id) {
        $callback_request = \App\Models\CallbackRequest::findOrFail($id);

        $callback_request->notes()->delete();
        $callback_request->delete();

        return response()->redirectToRoute('admin.callbacks.index');
    }

    public function note(int $id) {
        $callback_request = \App\Models\CallbackRequest::findOrFail($id);

        $validator = Validator::make(request()->input(), [
            'text' => ['required']
        ]);

        $validator->validate();

        $callback_request->notes()->create([
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
            'text' => request()->input('text')
        ]);

        return response()->json([
            'status' => true,
            'redirect' => route('admin.callbacks.edit', $callback_request->id)
        ]);
    }
}

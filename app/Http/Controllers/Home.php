<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Home extends Controller {
    public function index() {


        auth()->loginUsingId(1);
        return view('application.pages.home');
    }

    public function language(string $code) {
        $locales = config('app.locales');

        if(in_array($code, array_keys($locales))) {
            session()->put('locale', $code);
            app()->setLocale($code);
        }

        return redirect()->back();
    }

    public function feedback() {
        $validator = Validator::make(request()->input(), [
            'phone' => ['required_without:email'],
            'email' => ['required_without:phone'],
            'name' => ['required'],
            'text' => ['required']
        ]);

        $validator->validate();

        \App\Models\CallbackRequest::create(array_merge(request()->input(), [
            'user_id' => \Illuminate\Support\Facades\Auth::user()?->id
        ]));

        return response()->json([
            'status' => true,
            'message' => __('Your request has been sent successfully! We will contact you as soon as possible.')
        ]);
    }

    public function callback() {
        $validator = Validator::make(request()->input(), [
            'phone' => ['required_without:email'],
            'email' => ['required_without:phone'],
            'name' => ['required']
        ]);

        $validator->validate();

        \App\Models\CallbackRequest::create(array_merge(request()->input(), [
            'user_id' => \Illuminate\Support\Facades\Auth::user()?->id,
            'text' => __('Please call me back as soon as possible.')
        ]));

        return response()->json([
            'status' => true,
            'message' => __('Your request has been sent successfully! We will contact you as soon as possible.')
        ]);
    }
}

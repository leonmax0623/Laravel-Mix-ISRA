<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('application.pages.account-signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRegisterRequest $request) {
        $request->validated();

        $parts = explode(' ', $request->full_name);

        $role = \App\Models\Role::findBySlugOrFail('client');

        $user = new User();
        $user->first_name = array_shift($parts) ?? '';
        $user->last_name = is_array($parts) ? implode(' ', $parts) : '';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role()->associate($role);

        $user->save();

        event(new Registered($user));

//        Auth::login($user);

        return redirect(route('login'))->with([
            'notification-alert' => [
                'text' => __('auth.register')
            ]
        ]);
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserCreateRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'address_index' => ['numeric', 'nullable'],
            'entrance_floor' => ['numeric', 'nullable'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', \Illuminate\Validation\Rule::unique('users')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    protected function prepareForValidation() {
        $this->only((new \App\Models\User())->getFillable());
        $this->merge([
            'password' => $this->get('password'),
            'password_confirmation' => $this->get('password_confirmation'),
        ]);
    }

    protected function passedValidation() {
        $this->merge([
            'password' => Hash::make($this->get('password'))
        ]);
    }
}

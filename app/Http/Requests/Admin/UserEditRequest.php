<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserEditRequest extends FormRequest {
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
            'email' => ['required', \Illuminate\Validation\Rule::unique('users')->ignore(request()->route('id'))],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }

    protected function prepareForValidation() {
        $this->only(['test']);

        if(!$this->get('password')) {
            $this->request->remove('password');
            $this->request->remove('password_confirmation');
        }
    }

    protected function passedValidation() {
        if($this->get('password')) {
            $this->merge([
                'password' => Hash::make($this->get('password'))
            ]);
        }
    }
}

<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInformationRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation() {
        $this->only('first_name', 'last_name', 'passport_number', 'company_name', 'company_number', 'phone');

        $this->merge([
            'phone' => preg_replace('/[^0-9]/', '', $this->phone)
        ]);
    }
}

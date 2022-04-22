<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'address_index' => ['numeric', 'nullable']
        ];
    }

    protected function prepareForValidation() {
        $this->only('address_index', 'address_city', 'address_street', 'address_house');
    }
}

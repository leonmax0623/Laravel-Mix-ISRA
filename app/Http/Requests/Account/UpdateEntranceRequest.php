<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntranceRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'entrance_floor' => ['numeric', 'nullable']
        ];
    }

    protected function prepareForValidation() {
        $this->only('entrance_code', 'entrance_floor', 'entrance_apartment', 'entrance_elevator');
    }
}

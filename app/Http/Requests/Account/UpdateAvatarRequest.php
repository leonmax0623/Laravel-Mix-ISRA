<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'avatar' => ['file', 'image', 'between:0,1024']
        ];
    }

    protected function prepareForValidation() {
        $this->only('avatar');
    }
}

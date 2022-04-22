<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceEditRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => ['required'],
            'has_boxes' => ['boolean'],
            'has_pallets' => ['boolean'],
            'has_bulky_items' => ['boolean'],
            'products' => ['array']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'has_boxes' => (bool)$this->has_boxes,
            'has_pallets' => (bool)$this->has_pallets,
            'has_bulky_items' => (bool)$this->has_bulky_items,
            'products' => is_array($this->products) ? $this->products : []
        ]);
    }
}

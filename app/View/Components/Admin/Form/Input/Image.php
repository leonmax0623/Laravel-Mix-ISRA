<?php

namespace App\View\Components\Admin\Form\Input;

use Illuminate\View\Component;

class Image extends Component {
    public $name;
    public $value;
    public $url;

    public function __construct(string $name, string $value = '') {
        $this->name = $name;

        if($value && \Illuminate\Support\Facades\Storage::disk('public')->exists($value)) {
            $this->value = $value;
            $this->url = \Illuminate\Support\Facades\Storage::url($value);
        }
    }

    public function render() {
        return view('admin.components.form.input-image');
    }
}

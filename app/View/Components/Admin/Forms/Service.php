<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Service extends Component {
    public $service;

    public function __construct(?\App\Models\Service $service = NULL) {
        $this->service = $service;
    }

    public function render() {
        return view('admin.forms.service');
    }
}

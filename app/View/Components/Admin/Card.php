<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Card extends Component {
    public $component_id;
    public $footer;

    public function __construct($footer = NULL) {
        $this->component_id = uniqid();

        $this->footer = $footer;
    }

    public function render() {
        return view('components.admin.card');
    }
}

<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class VirtualBox extends Component {
    public $box;
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($box, $action) {
        $this->box = $box;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.forms.virtual-box');
    }
}

<?php

namespace App\View\Components\Admin\Widget;

use Illuminate\View\Component;

class Modal extends Component {
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id) {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.components.widget.modal');
    }
}

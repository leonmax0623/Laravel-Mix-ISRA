<?php

namespace App\View\Components\Admin\Form;

use Illuminate\View\Component;

class CallbackRequest extends Component {
    public $callbackRequest;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\CallbackRequest $callbackRequest) {
        $this->callbackRequest = $callbackRequest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.pages.callback-request.form');
    }
}

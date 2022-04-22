<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class WebPage extends Component {
    public $wp;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($wp) {
        $this->wp = $wp;
    }

    public function render() {
        return view('admin.forms.web-page');
    }
}

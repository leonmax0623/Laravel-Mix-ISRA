<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Branch extends Component {
    public $branch;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Branch $branch) {
        $this->branch = $branch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.forms.branch');
    }
}

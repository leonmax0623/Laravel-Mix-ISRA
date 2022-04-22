<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Faq extends Component {
    public $question;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Question $question) {
        $this->question = $question;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.forms.faq');
    }
}

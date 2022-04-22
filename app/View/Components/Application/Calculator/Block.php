<?php

namespace App\View\Components\Application\Calculator;

use Illuminate\View\Component;

class Block extends Component {
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title) {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('application.components.calculator.block');
    }
}

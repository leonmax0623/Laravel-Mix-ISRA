<?php

namespace App\View\Components\Admin\Sidebar;

use Illuminate\View\Component;

class NavTree extends Component {
    public $title;
    public $icon;
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, array $items = [], string $icon = '') {
        $this->title = $title;
        $this->items = $items;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('admin.components.sidebar.nav-tree');
    }
}

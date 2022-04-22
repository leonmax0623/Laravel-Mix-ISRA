<?php

namespace App\View\Components\Admin\Sidebar;

use Illuminate\View\Component;

class NavItem extends Component {
    public $title;
    public $route;
    public $route_params = [];
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $route, string $icon = '') {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;
    }

    public function routeParams(array $params = []) : self {
        $this->route_params = $params;

        return $this;
    }

    public function render() {
        return view('admin.components.sidebar.nav-item');
    }
}

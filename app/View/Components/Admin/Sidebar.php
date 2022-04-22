<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Sidebar extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $orders_items = collect(\App\Models\Service::active()->get())->map(function($service) {
            return (new \App\View\Components\Admin\Sidebar\NavItem($service->short_name ?: $service->name, 'admin.orders.index'))
                ->routeParams(['filter_service_id' => $service->id]);
        });

        return view('admin.components.sidebar', [
            'orders_items' => $orders_items
        ]);
    }
}

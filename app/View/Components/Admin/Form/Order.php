<?php

namespace App\View\Components\Admin\Form;

use Illuminate\View\Component;

class Order extends Component {
    public $order;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Order $order) {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $virtual_boxes_free = \App\Models\VirtualBox::free()->get();

        if($this->order->exists) {
            $this->order->boxes()->with(['virtualBox'])->get()->map(function($order_box) use ($virtual_boxes_free) {
                if(!is_null($order_box->virtualBox)) {
                    $virtual_boxes_free->push($order_box->virtualBox);
                }
            });
        }

        return view('admin.pages.order.form', [
            'virtual_boxes_free' => $virtual_boxes_free
        ]);
    }
}

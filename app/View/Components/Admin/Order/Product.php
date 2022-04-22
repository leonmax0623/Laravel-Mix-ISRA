<?php

namespace App\View\Components\Admin\Order;

use Illuminate\View\Component;

class Product extends Component {
    public $product;

    public function __construct(?\App\Models\Product $product = NULL) {
        $this->product = $product;
    }

    public function render() {
        return view('components.admin.order.product');
    }
}

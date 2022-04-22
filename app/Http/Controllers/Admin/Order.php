<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Order extends Controller {
    public function productList() {
        $products = Product::all();

        return view('page.admin.orders.product-list', [
            'products' => $products
        ]);
    }

    public function productEdit(int $id) {
        $product = Product::findOrFail($id);

        return view('page.admin.orders.product-edit', ['product' => $product]);
    }

    public function productEditRequest(Request $request) {
        $product = Product::findOrFail($request->route('id'));

        foreach ($request->only('title', 'description', 'price') as $k => $v) {
            $product->$k = $v;
        }

        $image = $request->file('image');
        if($request->hasFile('image') && $image->isValid() && mb_strpos($image->getMimeType(), 'image/') === 0) {
            $product->removeImage();

            $filename = sprintf('%d-%s.%s', $product->id, microtime(true), $image->extension());
            $path = $image->storePubliclyAs('products', $filename, 'public');

            $product->image = $path;
        }

        $product->save();

        return redirect()->back()->with([
            'alert' => [
                'type' => 'success',
                'message' => __('alert.success.order-product-edit')
            ]
        ]);
    }

    public function productCreate() {
        return view('page.admin.orders.product-create');
    }

    public function productCreateRequest(Request $request) {
        $product = new Product();

        foreach ($request->only('title', 'description', 'price') as $k => $v) {
            $product->$k = $v;
        }

        $image = $request->file('image');
        if($request->hasFile('image') && $image->isValid() && mb_strpos($image->getMimeType(), 'image/') === 0) {
            $product->removeImage();

            $filename = sprintf('%d-%s.%s', $product->id, microtime(true), $image->extension());
            $path = $image->storePubliclyAs('products', $filename, 'public');

            $product->image = $path;
        }

        $product->save();

        return redirect()->route('admin.order.products.list')->with([
            'alert' => [
                'type' => 'success',
                'message' => __('alert.success.order-product-create')
            ]
        ]);
    }
}

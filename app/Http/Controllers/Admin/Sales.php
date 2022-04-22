<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\OrdersExport;

class Sales  extends Controller {
    public function index() {


        $orders_filter = [
            'filter_order_status_id' => request()->get('filter_order_status_id'),
            'filter_payment_status_id' => request()->get('filter_payment_status_id'),
            'filter_branch_id' => request()->get('filter_branch_id'),
            'filter_service_id' => request()->get('filter_service_id'),
            'filter_client_type_id' => request()->get('filter_client_type_id')
        ];

        $orders = \App\Models\Order::with(['branch', 'user', 'invoices'])->orderByDesc('id');

        if(request()->has('filter_order_status_id')) {
            $orders->where('order_status_id', '=', request()->get('filter_order_status_id'));
        }

        if(request()->has('filter_payment_status_id')) {
            $orders->where('payment_status_id', '=', request()->get('filter_payment_status_id'));
        }



        $orders = $orders->paginate(25);
        $orders->appends($orders_filter);

        return view('admin.pages.sales', [
            'filter' => $orders_filter,
            'orders' => $orders
        ]);
    }


    public function export()
    {
        return \Excel::download(new OrdersExport(), 'orders.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

}

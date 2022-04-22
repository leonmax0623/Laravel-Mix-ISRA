<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Invoice extends Controller {

    public function create() {
        $validator = \Illuminate\Support\Facades\Validator::make(request()->all(), [
            'order_id' => ['required', 'exists:App\Models\Order,id'],
            'payment_type_id' => ['required'],
            'number' => ['required'],
            'amount' => ['required', 'numeric'],
            'comment' => ['nullable'],
            'status' => ['required', 'boolean'],
            'payment_date' => ['required', 'date_format:d.m.Y'],
            'expiry_date' => ['required', 'date_format:d.m.Y']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = request()->input();
        $data['payment_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('payment_date'));
        $data['expiry_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('expiry_date'));

        $invoice = \App\Models\Invoice::create($data);

        return response()->json($invoice->id);
    }

    public function edit() {
        $validator = \Illuminate\Support\Facades\Validator::make(request()->all(), [
            'order_id' => ['required', 'exists:App\Models\Order,id'],
            'payment_type_id' => ['required'],
            'number' => ['required'],
            'amount' => ['required', 'numeric'],
            'comment' => ['nullable'],
            'status' => ['required', 'boolean'],
            'payment_date' => ['required', 'date_format:d.m.Y'],
            'expiry_date' => ['required', 'date_format:d.m.Y']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

      
        $invoice = \App\Models\Invoice::find(request()->input('invoice_id'));

        $invoice->order_id = request()->input('order_id');
        $invoice->payment_type_id = request()->input('payment_type_id');
        $invoice->number = request()->input('number');
        $invoice->amount = request()->input('amount');
        $invoice->comment = request()->input('comment');
        $invoice->status = request()->input('status');
        $data['payment_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('payment_date'));
        $data['expiry_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', request()->input('expiry_date'));

        $invoice->save();

        return response()->json($invoice->id);
    }

    public function status() {
        $invoice = \App\Models\Invoice::find(request()->input('invoice_id'));
        $status = request()->input('status');

        if(!is_null($invoice) && !is_null($status)) {
            $invoice->status = $status;
            $invoice->save();
        }

        return response()->json(true);
    }

    public function delete() {
        $invoice = \App\Models\Invoice::find(request()->input('invoice_id'));

        if(!is_null($invoice)) {
            $invoice->delete();
        }

        return response()->json(true);
    }
}

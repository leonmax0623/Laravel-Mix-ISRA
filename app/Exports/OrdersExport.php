<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $orders = Order::query()
//            ->where('order_status_id', config('enum.order_status.finished.id'))
        ;

        $collection = $orders->get();

        return $collection;
    }


    public function headings(): array
    {
        return [
            '#',
            'Name of the Client',
            'Client Number',
            'RIVHIT Number',
            'City',
            'Services',
            'Start Date',
            'End Date',
            'Date of Payment',
            'Paid for',
            'Price per Month, ILS',
            'Paid, Total, ILS',
            'Status of the Client',
            'Invoice Number',
            'Invoice  Created',
        ];
    }

    /**
     * @var Order $order
     */
    public function map($order): array
    {

        $user = $order->user;
        $invoice = $order->invoices()->first();
        $sum = $order->invoices()->sum('amount');
        $service = $order->service;
        $paid_for = 'Period '.$invoice->created_at
//                ->format('d/m/y')
            .'-'.$invoice->expiry_date
//                ->format('d/m/y')
        ;

        return [
            $order->id,
            $user->first_name.' '.$user->last_name,
            $user->id,
            $user->rivhit,
            $user->address_city,
            $service->name,
          $order->delivery_datetime,
          $order->pickup_datetime,
          $invoice->payment_date,
            $paid_for,
            $invoice->amount,
            $sum,
            'active',
            $invoice->number,
            $invoice->created_at,
        ];
    }
}

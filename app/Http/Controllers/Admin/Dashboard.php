<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller {
    public function index() {
        $orders = \App\Models\Order::latest()->with(['user', 'invoices', 'service'])->limit(5)->get();

        $tasks = collect()
            ->merge(\App\Models\TaskManager\Task::today()->get())
            ->merge(\App\Models\TaskManager\Task::tomorrow()->get());

        return view('admin.pages.dashboard', [
            'orders' => $orders,
            'tasks' => $tasks
        ]);
    }
}

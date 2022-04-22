<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Service extends Controller {
    public function list() {
        $services = \App\Models\Service::all();

        return view('admin.pages.service-list', [
            'services' => $services
        ]);
    }

    public function edit() {
        $service = \App\Models\Service::findOrFail(request()->route('id'));

        return view('admin.pages.service-edit', [
            'service' => $service
        ]);
    }

    public function editRequest(\App\Http\Requests\Admin\ServiceEditRequest $request) {
        $service = \App\Models\Service::findOrFail(request()->route('id'));

        $service->update($request->input());
        $service->products()->sync($request->input('products'));

        return redirect()->back();
    }
}

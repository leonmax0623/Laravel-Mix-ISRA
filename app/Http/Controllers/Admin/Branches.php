<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Branches extends Controller {
    public function index() {
        if (request()->ajax()) {
            return \Yajra\DataTables\Facades\DataTables::of(\App\Models\Branch::orderBy('id', 'DESC'))
                ->addColumn('url_edit', fn($branch) => route('admin.branches.edit', $branch->id))
                ->make(true);
        }

        return view('admin.pages.branch-list');
    }

    public function create() {
        return view('admin.pages.branch-create');
    }

    public function store() {
        $validator = \Illuminate\Support\Facades\Validator::make(request()->input(), [
            'name' => ['required', 'array'],
            'address' => ['required', 'array']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        \App\Models\Branch::create(request()->input());

        return redirect()->route('admin.branches.index');
    }

    public function edit() {
        $branch = \App\Models\Branch::findOrFail(request()->route('branch'));

        return view('admin.pages.branch-edit', ['branch' => $branch]);
    }

    public function update() {
        $branch = \App\Models\Branch::findOrFail(request()->route('branch'));

        $branch->update(request()->input());

        return redirect()->route('admin.branches.edit', $branch->id);
    }

    public function destroy() {
        $branch = \App\Models\Branch::findOrFail(request()->route('branch'));

        $branch->delete();

        return redirect()->route('admin.branches.index');
    }
}

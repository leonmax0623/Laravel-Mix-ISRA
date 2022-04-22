<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VirtualBox extends Controller {
    public function list() {
        if (request()->ajax()) {
            return \Yajra\DataTables\Facades\DataTables::of(\App\Models\VirtualBox::with('order')->get())
                ->addIndexColumn()
                ->addColumn('delete', function($virtual_box) {
                        $btn1 = sprintf('<a href="%s" class="btn btn-warning">%s</a>', route('admin.virtual-box.delete', $virtual_box->id), __('Delete'));
                        if($virtual_box->order == null) return $btn1;
                        return null;
                    })
                ->addColumn('action', function($virtual_box) {
                        $btn = sprintf('<a href="%s" class="btn btn-primary">%s</a>', route('admin.virtual-box.edit', $virtual_box->id), __('Edit'));
                        return $btn;
                    })
                ->rawColumns(['action', 'delete'])
                ->make(true);
        }

        return view('admin.pages.virtual-box-list');
    }

    public function create() {
        return view('admin.pages.virtual-box-create');
    }

    public function createRequest(Request $request) {

        // $validator = Validator::make($request->all(), [
        //     'name' => ['required']
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        for($i=1; $i<10; $i++) {
            if($request->input('name'.$i)) {
                $virtual_box = new \App\Models\VirtualBox();
                $virtual_box->name = $request->input('name'.$i);
                $virtual_box->save();
            }
        }

        return redirect()->route('admin.virtual-box.list');
    }

    public function edit(int $id, Request $request) {
        $virtual_box = \App\Models\VirtualBox::findOrFail($id);
        
        if($request->input('name') != null) {
            $virtual_box->name = $request->input('name');
            $virtual_box->save();
        }

        return view('admin.pages.virtual-box-edit', ['virtual_box' => $virtual_box]);
    }

    public function delete(int $id) {
        $virtual_box = \App\Models\VirtualBox::destroy($id);

        return redirect()->route('admin.virtual-box.list');
    }
}

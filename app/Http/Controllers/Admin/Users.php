<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Users extends Controller {
    public function list() {
        if (request()->ajax()) {
            return \Yajra\DataTables\Facades\DataTables::of(\App\Models\User::orderBy('id', 'DESC'))
                ->addColumn('action', function($user) {
                    return sprintf('<a href="%s" class="btn btn-sm btn-primary">%s</a>', route('admin.users.edit', ['id' => $user->id]), __('Edit'));
                })
                ->make(true);
        }

        return view('admin.pages.user-list');
    }

    public function create() {
        return view('admin.pages.user-create');
    }

    public function createRequest(UserCreateRequest $request) {
        $request->validated();

        $user = User::create($request->all());

        return redirect()->route('admin.users.edit', ['id' => $user->id])->with([
            'alert' => [
                'type' => 'success',
                'message' => __('alert.success.user-create')
            ]
        ]);
    }

    public function edit(int $id) {
        $user = User::findOrFail($id);

        return view('admin.pages.user-edit', ['user' => $user]);
    }

    public function editRequest(UserEditRequest $request) {
        $request->validated();

        $user = User::findOrFail($request->route('id'));

        $user->update($request->all());

        return redirect()->back()->with([
            'alert' => [
                'type' => 'success',
                'message' => __('alert.success.user-edit')
            ]
        ]);
    }

    public function authorizeAs(int $id) {
        $user = User::findOrFail($id);

        \Illuminate\Support\Facades\Auth::loginUsingId($user->id);

        return redirect()->route('account');
    }
}

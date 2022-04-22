<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebPages extends Controller {
    public function index() {
        if (request()->ajax()) {
            return \Yajra\DataTables\Facades\DataTables::of(\App\Models\WebPage::orderBy('id', 'DESC'))
                ->addColumn('url_edit', fn($web_page) => route('admin.web-pages.edit', $web_page->id))
                ->addColumn('url_view', fn($web_page) => route('webpage', $web_page->slug))
                ->make(true);
        }

        return view('admin.pages.web-page-list');
    }

    public function create() {
        return view('admin.pages.web-page-create');
    }

    public function store(Request $request) {
        $validator = \Illuminate\Support\Facades\Validator::make(request()->input(), [
            'title' => ['required', 'array'],
            'html' => ['required', 'array'],
            'slug' => ['required', 'unique:web_pages,slug']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        \App\Models\WebPage::create(request()->input());

        return redirect()->route('admin.web-pages.index');
    }

    public function edit($id) {
        $web_page = \App\Models\WebPage::findOrFail($id);

        return view('admin.pages.web-page-edit', ['web_page' => $web_page]);
    }

    public function update($id) {
        $web_page = \App\Models\WebPage::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make(request()->input(), [
            'title' => ['required', 'array'],
            'html' => ['required', 'array'],
            'slug' => ['required', 'unique:web_pages,slug,' . $web_page->id]
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $web_page->update(request()->input());

        return redirect()->route('admin.web-pages.edit', $web_page->id);
    }

    public function destroy($id) {
        $web_page = \App\Models\WebPage::findOrFail($id);

        $web_page->delete();

        return redirect()->route('admin.web-pages.index');
    }
}

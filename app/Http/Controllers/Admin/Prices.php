<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Prices extends Controller {
    public function index() {
        if(request()->isMethod('POST')) {
            foreach(request()->input() as $key => $value) {
                if (is_null($value) || mb_strpos($key, '_') === 0) {
                    settings()->forget($key);
                } else {
                    settings()->set($key, $value);
                }
            }

            settings()->save();
        }

        return view('admin.pages.prices');
    }
}

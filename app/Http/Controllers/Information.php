<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Information extends Controller {
    public function faq() {
        return view('application.pages.faq');
    }

    public function calculator() {
        return view('application.pages.calculator');
    }

    public function contacts() {
        return view('application.pages.contacts');
    }

    public function forBusiness() {
        return view('application.pages.for-business');
    }

    public function forConsumers() {
        return view('application.pages.for-consumers');
    }
}

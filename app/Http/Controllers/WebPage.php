<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPage extends Controller {
    public function index(\App\Models\WebPage $web_page) {
        return view('application.pages.web-page', [
            'web_page' => $web_page
        ]);
    }
}

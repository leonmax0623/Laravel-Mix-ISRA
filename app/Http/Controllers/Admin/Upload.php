<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Upload extends Controller {
    public function image() {
        if(request()->hasFile('image')) {
            $image = request()->file('image');

            $filename = microtime(true) . '_' . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));

            $file = $image->storeAs('upload/images', $filename, 'public');

            return response()->json([
                'file' => $file,
                'url' => \Illuminate\Support\Facades\Storage::url($file)
            ]);
        }

        return response()->json(false);
    }
}

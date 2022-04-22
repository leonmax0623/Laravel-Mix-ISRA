<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class Blog extends Controller {
    public function list() {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);

        return view('application.pages.blog-list', [
            'posts' => $posts
        ]);
    }

    public function post() {
        $post = Post::findOrFail(request()->route('id'));

        return view('application.pages.blog-article', [
            'post' => $post
        ]);
    }
}

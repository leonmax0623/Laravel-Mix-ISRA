<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class Blog extends Controller {
    public function list() {
        $posts = Post::orderBy('id', 'desc')->paginate(15);

        return view('page.admin.blog.list', ['posts' => $posts]);
    }

    public function create() {
        return view('page.admin.blog.post');
    }

    public function createRequest(Request $request) {
        $post_info = $request->get('post');

        $post = new Post();

        foreach ($post_info as $key => $values) {
            if (is_array($values)) {
                foreach ($values as $language => $value) {
                    $post->setTranslation($key, $language, $value);
                }
            } else {
                $post->$key = $values;
            }
        }

        $post->user()->associate(auth()->user());

        $post->save();

        if($request->input('image')) {
            $image = new \App\Models\Image();
            $image->file = $request->input('image');

            $post->image()->save($image);
        }

        return redirect()->route('admin.blog.list');
    }

    public function edit(int $id) {
        $post = Post::findOrFail($id);

        return view('page.admin.blog.post', ['post' => $post]);
    }

    public function editRequest(int $id) {
        $post = Post::findOrFail($id);


        foreach (request()->get('post') as $key => $values) {
            if (is_array($values)) {
                foreach ($values as $language => $value) {
                    $post->setTranslation($key, $language, $value);
                }
            } else {
                $post->$key = $values;
            }
        }

        $post->user()->associate(auth()->user());

        if(request()->input('image')) {
            if($image = $post->image) {
                $image->file = request()->input('image');
                $image->save();
            } else {
                $image = new \App\Models\Image();
                $image->file = request()->input('image');

                $post->image()->save($image);
            }
        } elseif($post->image) {
            $post->image->delete();
        }

        $post->save();

        return redirect()->route('admin.blog.list');
    }
}

<?php

namespace App\View\Components\Admin\Blog;

use Illuminate\View\Component;

class Post extends Component {
    public $post;

    public function __construct(?\App\Models\Blog\Post $post = NULL) {
        $this->post = $post;
    }

    public function render() {
        return view('components.admin.blog.post');
    }
}

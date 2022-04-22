<?php

namespace App\Models\Blog;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model {
    use HasFactory, HasTranslations;

    protected $table = 'blog_posts';

    public $fillable = ['title', 'preview', 'description'];
    public $translatable = ['title', 'preview', 'description'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPage extends Model {
    use HasFactory, \Spatie\Translatable\HasTranslations;

    protected $fillable = ['title', 'html', 'slug'];

    public $translatable = ['title', 'html'];

    public function resolveRouteBinding($value, $field = NULL) {
        return $this->where('slug', $value)->firstOrFail();
    }
}

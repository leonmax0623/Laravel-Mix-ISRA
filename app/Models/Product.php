<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model {
    use HasFactory, HasTranslations, HasImage;

    public $translatable = ['title', 'description'];

    public function services() {
        return $this->belongsToMany(Product::class, 'services_products', 'product_id', 'service_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model {
    use HasFactory, HasTranslations;

    protected $table = 'services';
    protected $fillable = [
        'name', 'short_name', 'has_boxes', 'slug',
        'has_pallets', 'has_bulky_items', 'status'
    ];

    public $translatable = ['name', 'short_name'];
    public $timestamps = false;

    public function products() {
        return $this->belongsToMany(Product::class, 'services_products', 'service_id', 'product_id');
    }

    public function scopeActive($query) {
        return $query->where('status', '=', 1);
    }
}

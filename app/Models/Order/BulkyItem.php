<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkyItem extends Model {
    use HasFactory;

    protected $table = 'orders_bulky_items';

    protected static function booted() {
        static::deleted(function($model) {
            $model->image()->delete();
        });
    }

    public function order() {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    public function image() {
        return $this->morphOne(\App\Models\Image::class, 'imageable');
    }
}

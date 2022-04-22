<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualBox extends Model {
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function order() {
        return $this->hasOneThrough(Order::class, \App\Models\Order\Box::class, 'virtual_box_id', 'id', '', 'order_id');
    }

    public function orderBox() {
        return $this->belongsTo(\App\Models\Order\Box::class, 'id', 'virtual_box_id');
    }

    public function scopeFree($query) {
        return $query->whereDoesntHave('orderBox');
    }
}

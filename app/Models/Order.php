<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'service_id', 'order_status_id', 'payment_status_id', 'payment_type_id', 'branch_id',
        'rivhit', 'location', 'delivery_datetime', 'pickup_datetime', 'expiry_date',
        'address_index', 'address_city', 'address_street', 'address_house',
        'entrance_code', 'entrance_floor', 'entrance_apartment', 'entrance_elevator',
        'comment', 'phone_1', 'phone_2', 'user_id', 'volume'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withDefault([
            'name' => __('Unknown')
        ]);
    }

    public function bulkyItems() {
        return $this->hasMany(\App\Models\Order\BulkyItem::class, 'order_id', 'id');
    }

    public function images() {
        return $this->hasMany(\App\Models\Order\Images::class, 'order_id', 'id');
    }

    public function pallets() {
        return $this->hasMany(\App\Models\Order\Pallet::class, 'order_id', 'id');
    }

    public function boxes() {
        return $this->hasMany(\App\Models\Order\Box::class, 'order_id', 'id');
    }

    public function invoices() {
        return $this->hasMany(Invoice::class, 'order_id', 'id');
    }

    public function scopeOrderStatus($query, ...$args) {
        return $query->where(function ($query) use ($args) {
            foreach($args as $order_status) {
                $query->orWhere('order_status_id', '=', config('enum.order_status.' . $order_status . '.id'));
            }
        });
    }

    public function scopeLatest($query) {
        return $query->orderByDesc('id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->order_status_id = $model->order_status_id ?? config('enum.order_status.new.id');
            $model->payment_status_id = $model->payment_status_id ?? config('enum.payment_status.not_paid.id');
        });
    }
}

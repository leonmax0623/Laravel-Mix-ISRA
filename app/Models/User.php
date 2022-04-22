<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'passport_number', 'company_name', 'company_number',
        'email', 'password', 'phone', 'role_id', 'country_id', 'language_id',
        'sex_id', 'client_type_id', 'address_index', 'address_city', 'address_street',
        'address_house', 'entrance_code', 'entrance_floor', 'entrance_apartment',
        'entrance_elevator', 'rivhit', 'credit_card', 'credit_type', 'comment'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'entrance_elevator' => 'boolean'
    ];

    public function image() {
        return $this->morphOne(Image::class, 'imageable')->withDefault([
            'file' => 'images/account-avatar-default.png'
        ]);
    }

    public function getFullNameAttribute() : string {
        return trim($this->first_name . ' ' . $this->last_name, ' ');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function invoices() {
        return Invoice::select('invoices.*')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->where('orders.user_id', '=', $this->id)
            ->orderByDesc('id');
    }

    public function scopeRole($query, ...$args) {
        return $query->where(function ($query) use ($args) {
            foreach($args as $role) {
                $query->orWhere('role_id', '=', config('enum.role.' . $role . '.id'));
            }
        });
    }
}

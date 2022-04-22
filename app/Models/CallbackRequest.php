<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallbackRequest extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'phone', 'email', 'name', 'text', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function notes() {
        return $this->hasMany(CallbackRequestNote::class, 'callback_request_id', 'id');
    }

    public function getIsNewStatusAttribute() {
        return $this->status === 0;
    }

    public function getIsProcessingStatusAttribute() {
        return $this->status === 1;
    }

    public function getIsCompletedStatusAttribute() {
        return $this->status === 2;
    }
}

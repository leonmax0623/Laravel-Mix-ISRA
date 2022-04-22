<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallbackRequestNote extends Model {
    use HasFactory;

    protected $table = 'callback_requests_notes';

    protected $fillable = ['user_id', 'text'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function callbackRequest() {
        return $this->belongsTo(\App\Models\CallbackRequest::class, 'callback_request_id', 'id');
    }
}

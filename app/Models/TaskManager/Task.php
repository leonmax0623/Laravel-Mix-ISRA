<?php

namespace App\Models\TaskManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    protected $table = 'task_manager_tasks';

    public $timestamps = false;

    protected $fillable = [
        'date', 'caption', 'type', 'manager',
        'order', 'deadline_datetime',
        'loading_worker', 'transport', 'details'
    ];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function manager() {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id')->withDefault([
            'first_name' => __('Unknown')
        ]);
    }

    public function scopeToday($query) {
        return $query->where('date', '=', \Carbon\Carbon::now()->toDateString());
    }

    public function scopeTomorrow($query) {
        return $query->where('date', '=', \Carbon\Carbon::now()->addDay()->toDateString());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model {
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'address', 'service_area', 'map_google_url'];

    public $translatable = ['name', 'address', 'service_area'];
    public $timestamps = false;
}

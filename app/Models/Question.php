<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model {
    use HasFactory, HasTranslations;

    public $fillable = ['question', 'answer'];
    public $translatable = ['question', 'answer'];

    public $timestamps = false;
}

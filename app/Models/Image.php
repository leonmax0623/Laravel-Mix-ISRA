<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model {
    use HasFactory;

    protected $fillable = ['file', 'comment'];

    public function imageable() {
        return $this->morphTo();
    }

    public function hasImage() : bool {
        return is_file(Storage::disk('public')->path($this->file));
    }

    public function getThumbUrl($width = NULL, $height = NULL) : ?string {
        if(!$this->hasImage()) {
            return NULL;
        }

        if(!is_null($width) && !is_null($height)) {
            $parts = explode('.', $this->file);
            $extension = array_pop($parts);
            $name = implode('.', $parts);

            $filename = 'cache/' . $name . '-' . $width . 'x' . $height . '.' . $extension;

            if(is_file(Storage::disk('public')->path($filename))) {
                return Storage::disk('public')->url($filename);
            }

            Storage::disk('public')->put($filename, '');

            \Intervention\Image\Facades\Image::make(Storage::disk('public')->path($this->file))
                ->fit($width, $height)
                ->save(Storage::disk('public')->path($filename));

            return Storage::disk('public')->url($filename);
        }

        return Storage::disk('public')->url($this->file);
    }

    public function removeImage() : void {
        $parts = explode('.', $this->image);
        $extension = array_pop($parts);
        $name = implode('.', $parts);

        $files = array_filter(Storage::disk('public')->files('products'), function($file) use ($name) {
            var_dump($name);
            return mb_strpos($file, $name . '-') === 0;
        });

        foreach($files as $file) {
            Storage::disk('public')->delete($file);
        }

        Storage::disk('public')->delete($this->image);
    }
}

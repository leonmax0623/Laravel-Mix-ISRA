<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait HasImage {
    public function hasImage() : bool {
        return is_file(Storage::disk('public')->path($this->image));
    }

    public function getImageUrl($width = NULL, $height = NULL) : ?string {
        if(!$this->hasImage()) {
            return NULL;
        }

        if(!is_null($width) && !is_null($height)) {
            $parts = explode('.', $this->image);
            $extension = array_pop($parts);
            $name = implode('.', $parts);

            $filename = $name . '-' . $width . 'x' . $height . '.' . $extension;

            if(is_file(Storage::disk('public')->path($filename))) {
                return Storage::disk('public')->url($filename);
            }

            Image::make(Storage::disk('public')->path($this->image))
                ->fit($width, $height)
                ->save(Storage::disk('public')->path($filename));

            return Storage::disk('public')->url($filename);
        }

        return Storage::disk('public')->url($this->image);
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

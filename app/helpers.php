<?php

use Illuminate\Support\Facades\Storage;

if(!function_exists('image_thumbnail')) {
    function image_thumbnail(string $file, int $width, int $height) : string {
        $filesystem = new Illuminate\Filesystem\Filesystem();

        $file_absolute = Storage::disk('public')->path($file_relative = 'cache/' . preg_replace('/(.*)(\..*)/', '$1' . '-' . $width . 'x' . $height . '$2', $file));

        if(!$filesystem->isDirectory(pathinfo($file_absolute)['dirname'])) {
            $filesystem->makeDirectory(pathinfo($file_absolute)['dirname'], 0755, true, true);
        }

        $image = \Intervention\Image\Facades\Image::make(Storage::disk('public')->path($file));
        $image->resize($width, $height);
        $image->save($file_absolute);

        return $file_relative;
    }
}

if(!function_exists('get_enum_name')) {
    function get_enum_name(string $enum, string $key) : ?string {
        $enum = config('enum.' . $enum);

        if(is_numeric($key)) {
            foreach($enum as $value) {
                if((int)$value['id'] === (int)$key) {
                    return $value['name'];
                }
            }
        }

        return $enum[$key]['name'] ?? NULL;
    }
}

if(!function_exists('get_enum_id')) {
    function get_enum_id(string $enum, string $key) : ?int {
        return (int)config('enum.' . $enum . '.' . $key . '.id');
    }
}

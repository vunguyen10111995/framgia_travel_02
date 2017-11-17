<?php

namespace App\Helpers;

class Helper
{
    public static function importFile($file, $path)
    {
        if (isset($file)) {
            $file_name = $file->hashName();
            $file->move($path, $file_name);
            return $file_name;
        }
    }
    public static function deleteFile($name, $path)
    {
        if (is_file($path . $name)) {
            unlink($path . $name);
        }
    }
}

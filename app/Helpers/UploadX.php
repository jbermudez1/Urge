<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadX
{
    public static function uploadFile($file, $folder, $name)
    {
        $extension = $file->getClientOriginalExtension();

        // Verify if directory exists
        if(!is_dir($folder))
        {
            // Create directory
            Storage::disk('local')->makeDirectory($folder);
        }

        // Generate url to file
        $url = '/' . $folder . '/' . $name . '.' . $extension;

        // Put the file into folder
        try
        {
            Storage::disk('local')->put($url, File::get($file));
            return compact('url','extension');
        }
        catch(\Exception $e)
        {
            // If copy file is wrong
            return false;
        }
    }

    public static function downloadFile($url, $name)
    {
        $file = public_path() . '/' . $url;
        $headers = array();
        return response()->download($file, $name, $headers);
    }

    public static function deleteFile($url)
    {
        return Storage::disk('local')->delete($url);
    }
}
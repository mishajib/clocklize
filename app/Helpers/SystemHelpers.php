<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// Get file from storage folder
if (! function_exists('storagelink')) {
    function storagelink($url, $type = 'default')
    {
        $url = $url ?? '';
        if (Storage::disk('public')->exists($url)) {
            return Storage::disk('public')->url($url);
        } else {
            if ($type == 'user') {
                return asset('assets/img/avatar5.png');
            }

            return asset('assets/img/mi-logo.png');
        }
    }
}

// Check user permission
if (! function_exists('checkPermission')) {
    function checkPermission($role)
    {
        if (! auth()->user()->hasRole($role)) {
            abort(403, __('default.you_do_not_have_permission_to_access_this'));
        }
    }
}

// Check current route
if (! function_exists('routeIs')) {
    function routeIs($route)
    {
        return request()->routeIs($route);
    }
}

// Upload image and return the uploaded path
function imageUploadHandler($image, $request_path = 'default', $size = null, $old_image = null)
{
    if (isset($old_image)) {
        if (Storage::disk('public')->exists($old_image)) {
            Storage::disk('public')->delete($old_image);
        }
    }

    $path = $image->store($request_path, 'public');

    if (isset($size)) {
        $request_size = explode('x', $size);
        $width = $request_size[0];
        $height = $request_size[1];
    } else {
        $width = 80;
        $height = 80;
    }

    $image = Image::make(Storage::disk('public')->get($path))->fit($width, $height)->encode();

    Storage::disk('public')->put($path, $image);

    return $path;
}

// Session flash
if (! function_exists('sendFlash')) {
    function sendFlash($message, $type = 'toast_success')
    {
        session()->flash($type, $message);
    }
}

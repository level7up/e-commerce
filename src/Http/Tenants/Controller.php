<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
    public function uploadTo(string $path, UploadedFile $file)
    {
        return Storage::disk('public')->put($path, $file);
    }

    public function uploadFile(string $path, UploadedFile $file)
    {
        return pathinfo(Storage::disk('public')->put($path, $file), PATHINFO_BASENAME);
    }

    public function deleteFile($path, $file)
    {
        return Storage::disk('public')->delete($path.'/'.$file);
    }
}
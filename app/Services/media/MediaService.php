<?php

namespace App\Services\media;

use Illuminate\Support\Facades\Storage;

class MediaService implements MediaServiceInterface
{
    const STORAGE_DISK = 'public';

    public function storeFromBase64(string $dataInBase64, string $path): string
    {
        $formatExploded = explode(',', $dataInBase64);
        $formatExploded = explode('/', $formatExploded[0]);
        $format = explode(';', $formatExploded[1])[0];

        $dataInBase64 = substr($dataInBase64, 1 + strpos($dataInBase64, ','));
        $file = base64_decode($dataInBase64);
        if ($file === false) {
            return false;
        }

        $filename = "$path.$format";
        Storage::disk(self::STORAGE_DISK)->put($filename, $file);
        return $filename;
    }

    public function delete(string $path)
    {
        if (Storage::disk(self::STORAGE_DISK)->exists($path)) {
            return Storage::disk(self::STORAGE_DISK)->delete($path);
        }

        return false;
    }

    public function deleteDir(string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
    }
}

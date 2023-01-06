<?php

namespace App\Services\media;

interface MediaServiceInterface
{
    /**
     * @param string $dataInBase64
     * @param string $path
     * @return string|false
     */
    public function storeFromBase64(string $dataInBase64, string $path): string;
}

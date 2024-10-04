<?php

namespace App\Services;

use Supabase\Storage\StorageClient;
use Exception;

class SupabaseService
{
    protected $storageClient;

    public function __construct()
    {
        $this->storageClient = new StorageClient(env('SUPABASE_URL'), env('SUPABASE_KEY'));
    }

    public function uploadImage($file, $bucketName = 'public')
    {
        try {
            $filePath = 'articles/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $bucket = $this->storageClient->from($bucketName);

            // Subir el archivo a Supabase Storage
            $response = $bucket->upload($filePath, file_get_contents($file->getRealPath()));

            if (!$response['error']) {
                // Obtener la URL pública de la imagen
                $publicUrl = $bucket->getPublicUrl($filePath);
                return $publicUrl;
            } else {
                throw new Exception($response['error']['message']);
            }
        } catch (Exception $e) {
            throw new Exception("Error al subir la imagen: " . $e->getMessage());
        }
    }
}

<?php

namespace App\Services;

use Uploadcare\Api;

class UploadcareService
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(
            getenv('UPLOADCARE_PUBLIC_KEY'),
            getenv('UPLOADCARE_SECRET_KEY')
        );
    }

    public function upload($file)
    {
        // Upload file fisik
        $uploader = $this->api->uploader;
        $upload = $uploader->fromPath($file->getPathname());

        // Ambil URL file public
        return $upload->getUrl();
    }
}

<?php

namespace AppBundle\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;

    /**
     * @param string $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $filename = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->targetDir, $filename);

        return $filename;
    }
}

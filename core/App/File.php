<?php
namespace App;

class File
{

    private $uploadDirectory;
    private $fileData;
    private $extension;
    private $tempFile;
    private $name;
    private $target;
    private $mimeType;
    private $acceptedExt = ["image/bmp", "image/cod", "image/gif", "image/ief", "image/jpe", "image/jpeg", "image/jfif", "image/svg", "image/tif", "image/tiff", "image/ras", "image/cmx", "image/ico", "image/pnm", "image/pbm", "image/pgm", "image/ppm", "image/rgb", "image/xbm", "image/xpm", "image/xwd"];

    public function __construct($index)
    {
        $this->uploadDirectory = dirname(__DIR__)."/../images/";

        $this->fileData = $_FILES[$index];

        $this->tempFile = $this->fileData['tmp_name'];

        $this->extension = pathinfo($this->fileData['name'], PATHINFO_EXTENSION);

        $this->name = uniqid().".".$this->extension;

        $this->target = $this->uploadDirectory . $this->name;

        $this->mimeType = $this->fileData["type"];

    }

    public function upload(){

        move_uploaded_file($this->tempFile, $this->target);
    }

    public function getName(){
        return $this->name;
    }

    
     public function isImage($index): bool
    {
       return in_array($index->mimeType, $this->acceptedExt);
    }

}
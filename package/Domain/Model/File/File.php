<?php

namespace Package\Domain\Model\File;

class File
{
    private FilePath $path;
    private FileUrl $url;

    public function __construct(FilePath $path, FileUrl $url)
    {
        $this->path = $path;
        $this->url = $url;
    }

    public function path(): FilePath
    {
        return $this->path;
    }

    public function url(): FileUrl
    {
        return $this->url;
    }
}

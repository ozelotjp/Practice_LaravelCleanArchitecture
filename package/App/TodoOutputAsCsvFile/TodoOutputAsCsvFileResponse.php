<?php

namespace Package\App\TodoOutputAsCsvFile;

use Package\Domain\Common\Url;

class TodoOutputAsCsvFileResponse
{
    private $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    public function url(): Url
    {
        return $this->url;
    }
}

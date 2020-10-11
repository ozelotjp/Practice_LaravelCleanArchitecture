<?php

namespace Package\UseCase\TodoOutputToCSV;

use Package\Domain\Model\File\File;

class TodoOutputToCSVOutputData implements TodoOutputToCSVOutput
{
    private File $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function file(): File
    {
        return $this->file;
    }
}

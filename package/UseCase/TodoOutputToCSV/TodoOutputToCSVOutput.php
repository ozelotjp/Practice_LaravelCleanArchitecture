<?php

namespace Package\UseCase\TodoOutputToCSV;

use Package\Domain\Model\File\File;

interface TodoOutputToCSVOutput
{
    public function file(): File;
}

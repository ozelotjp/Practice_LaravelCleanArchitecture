<?php

namespace Package\Gateway;

use Package\Domain\Model\File\File;
use Package\Domain\Model\Todo\Todo;

interface ITodoFile
{
    /**
     * @param Todo[] $todos
     */
    public function saveArrayToCSV(array $todos): File;
}

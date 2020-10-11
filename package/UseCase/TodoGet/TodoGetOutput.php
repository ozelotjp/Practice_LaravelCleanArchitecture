<?php

namespace Package\UseCase\TodoGet;

use Package\Domain\Model\Todo\Todo;

interface TodoGetOutput
{
    public function todo(): Todo;
}

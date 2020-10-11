<?php

namespace Package\UseCase\TodoUpdate;

use Package\Domain\Model\Todo\Todo;

interface TodoUpdateInput
{
    public function todo(): Todo;
}

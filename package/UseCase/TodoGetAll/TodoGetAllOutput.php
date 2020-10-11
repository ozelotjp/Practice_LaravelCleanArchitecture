<?php

namespace Package\UseCase\TodoGetAll;

use Package\Domain\Model\Todo\Todo;

interface TodoGetAllOutput
{
    /**
     * @return Todo[]
     */
    public function todos(): array;
}

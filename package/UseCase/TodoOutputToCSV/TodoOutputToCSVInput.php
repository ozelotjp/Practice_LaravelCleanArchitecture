<?php

namespace Package\UseCase\TodoOutputToCSV;

use Package\Domain\Model\Todo\Todo;

interface TodoOutputToCSVInput
{
    /**
     * @return Todo[]
     */
    public function todos(): array;
}

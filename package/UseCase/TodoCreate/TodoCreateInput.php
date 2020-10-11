<?php

namespace Package\UseCase\TodoCreate;

use Package\Domain\Model\Todo\TodoText;

interface TodoCreateInput
{
    public function todoText(): TodoText;
}

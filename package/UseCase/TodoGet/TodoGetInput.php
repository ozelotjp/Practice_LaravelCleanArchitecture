<?php

namespace Package\UseCase\TodoGet;

use Package\Domain\Model\Todo\TodoId;

interface TodoGetInput
{
    public function todoId(): TodoId;
}

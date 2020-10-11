<?php

namespace Package\UseCase\TodoCreate;

use Package\Domain\Model\Todo\TodoId;

interface TodoCreateOutput
{
    public function todoId(): TodoId;
}

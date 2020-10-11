<?php

namespace Package\UseCase\TodoGet;

use Package\Domain\Model\Todo\TodoId;

class TodoGetInputData implements TodoGetInput
{
    private TodoId $todoId;

    public function __construct(TodoId $todoId)
    {
        $this->todoId = $todoId;
    }

    public function todoId(): TodoId
    {
        return $this->todoId;
    }
}

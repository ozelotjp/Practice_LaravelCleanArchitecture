<?php

namespace Package\UseCase\TodoCreate;

use Package\Domain\Model\Todo\TodoId;

class TodoCreateOutputData implements TodoCreateOutput
{
    private TodoId $id;

    public function __construct(TodoId $id)
    {
        $this->id = $id;
    }

    public function todoId(): TodoId
    {
        return $this->id;
    }
}

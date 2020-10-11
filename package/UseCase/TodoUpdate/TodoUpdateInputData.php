<?php

namespace Package\UseCase\TodoUpdate;

use Package\Domain\Model\Todo\Todo;

class TodoUpdateInputData implements TodoUpdateInput
{
    private Todo $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function todo(): Todo
    {
        return $this->todo;
    }
}

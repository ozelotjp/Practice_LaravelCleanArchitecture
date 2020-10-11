<?php

namespace Package\UseCase\TodoGet;

use Package\Domain\Model\Todo\Todo;

class TodoGetOutputData implements TodoGetOutput
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

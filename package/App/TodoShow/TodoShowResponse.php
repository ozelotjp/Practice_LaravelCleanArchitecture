<?php

namespace Package\App\TodoShow;

use Package\Domain\Todo\Todo;

class TodoShowResponse
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function todo(): Todo
    {
        return $this->todo;
    }
}

<?php

namespace Package\App\TodoIndex;

class TodoIndexResponse
{
    private $todos;

    public function __construct(array $todos)
    {
        $this->todos = $todos;
    }

    public function todos(): array
    {
        return $this->todos;
    }
}

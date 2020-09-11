<?php

namespace Package\App\TodoIndex;

use Package\Domain\Todo\Todo;

class TodoIndexResponse
{
    private $todos;

    /**
     * TodoIndexResponse constructor.
     *
     * @param Todo[] $todos
     */
    public function __construct(array $todos)
    {
        $this->todos = $todos;
    }

    /**
     * @return Todo[]
     */
    public function todos(): array
    {
        return $this->todos;
    }
}

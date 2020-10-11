<?php

namespace Package\UseCase\TodoGetAll;

use Package\Domain\Model\Todo\Todo;

class TodoGetAllOutputData implements TodoGetAllOutput
{
    /** @var Todo[] */
    private array $todos;

    /**
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

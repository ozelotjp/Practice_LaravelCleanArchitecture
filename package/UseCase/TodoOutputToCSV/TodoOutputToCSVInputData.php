<?php

namespace Package\UseCase\TodoOutputToCSV;

use Package\Domain\Model\Todo\Todo;

class TodoOutputToCSVInputData implements TodoOutputToCSVInput
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

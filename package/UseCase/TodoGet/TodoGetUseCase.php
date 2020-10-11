<?php

namespace Package\UseCase\TodoGet;

use Package\Gateway\ITodoDatabase;

class TodoGetUseCase
{
    private ITodoDatabase $todoDatabase;

    public function __construct(ITodoDatabase $todoDatabase)
    {
        $this->todoDatabase = $todoDatabase;
    }

    public function execute(TodoGetInput $input): TodoGetOutput
    {
        $todo = $this->todoDatabase->get($input->todoId());

        return new TodoGetOutputData($todo);
    }
}

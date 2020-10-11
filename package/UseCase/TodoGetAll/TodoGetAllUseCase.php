<?php

namespace Package\UseCase\TodoGetAll;

use Package\Gateway\ITodoDatabase;

class TodoGetAllUseCase
{
    private ITodoDatabase $todoDatabase;

    public function __construct(ITodoDatabase $todoDatabase)
    {
        $this->todoDatabase = $todoDatabase;
    }

    public function execute(TodoGetAllInput $input): TodoGetAllOutput
    {
        $todos = $this->todoDatabase->getAll();

        return new TodoGetAllOutputData($todos);
    }
}

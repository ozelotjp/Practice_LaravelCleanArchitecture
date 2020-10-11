<?php

namespace Package\UseCase\TodoUpdate;

use Package\Gateway\ITodoDatabase;

class TodoUpdateUseCase
{
    private ITodoDatabase $todoDatabase;

    public function __construct(ITodoDatabase $todoDatabase)
    {
        $this->todoDatabase = $todoDatabase;
    }

    public function execute(TodoUpdateInput $input): TodoUpdateOutput
    {
        $this->todoDatabase->update($input->todo());

        return new TodoUpdateOutputData();
    }
}

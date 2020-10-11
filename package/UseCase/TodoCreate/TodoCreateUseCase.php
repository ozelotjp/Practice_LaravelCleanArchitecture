<?php

namespace Package\UseCase\TodoCreate;

use Carbon\Carbon;
use Package\Domain\Model\Todo\Todo;
use Package\Domain\Model\Todo\TodoCreatedAt;
use Package\Domain\Model\Todo\TodoDoneAt;
use Package\Domain\Model\Todo\TodoId;
use Package\Domain\Model\Todo\TodoText;
use Package\Domain\Model\Todo\TodoUpdatedAt;
use Package\Gateway\ITodoDatabase;

class TodoCreateUseCase
{
    private ITodoDatabase $todoDatabase;

    public function __construct(ITodoDatabase $todoDatabase)
    {
        $this->todoDatabase = $todoDatabase;
    }

    public function execute(TodoCreateInput $input): TodoCreateOutput
    {
        $todo = new Todo(
            new TodoId(null),
            new TodoText($input->todoText()->value()),
            new TodoDoneAt(null),
            new TodoCreatedAt(Carbon::now()),
            new TodoUpdatedAt(Carbon::now())
        );

        $id = $this->todoDatabase->create($todo);

        return new TodoCreateOutputData($id);
    }
}

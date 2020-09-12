<?php

namespace Package\App\TodoOutputAsCsvFile;

use Package\Infra\DB\TodoGateway;
use Package\Infra\Storage\CsvForTodoGateway;

class TodoOutputAsCsvFile
{
    private $todoGateway;
    private $csvForTodoGateway;

    public function __construct(TodoGateway $todoGateway, CsvForTodoGateway $csvForTodoGateway)
    {
        $this->todoGateway = $todoGateway;
        $this->csvForTodoGateway = $csvForTodoGateway;
    }

    public function execute(TodoOutputAsCsvFileRequest $request): TodoOutputAsCsvFileResponse
    {
        $header = ['ID', 'Text', 'DoneAt', 'CreatedAt', 'UpdatedAt'];

        $todos = [];
        foreach ($this->todoGateway->getAll() as $todo) {
            $todos[] = [
                $todo->id()->value(),
                $todo->text()->value(),
                $todo->doneAt()->value(),
                $todo->createdAt()->value(),
                $todo->updatedAt()->value(),
            ];
        }

        $url = $this->csvForTodoGateway->save($header, $todos);

        return new TodoOutputAsCsvFileResponse($url);
    }
}

<?php

namespace Package\Controllers\Todo;

use Package\Entities\Model\Todo\TodoId;
use Package\UseCases\Repository\TodoRepository;
use Package\UseCases\Todo\Show\TodoShowInput;
use Package\UseCases\Todo\Show\TodoShowInputData;
use Package\UseCases\Todo\Show\TodoShowOutput;
use Package\UseCases\Todo\Show\TodoShowOutputData;
use Package\UseCases\Todo\TodoObject;

class TodoShowController implements TodoShowInput
{
    private $repository;
    private $presenter;

    public function __construct(TodoRepository $repository, TodoShowOutput $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function handle(TodoShowInputData $input)
    {
        $todo = $this->repository->findById(new TodoId($input->id));

        $todoObject = new TodoObject(
            $todo->getId()->getValue(),
            $todo->getText()->getValue(),
            $todo->getDoneAt()->getValue(),
            $todo->getCreatedAt()->getValue(),
            $todo->getUpdatedAt()->getValue()
        );

        $data = new TodoShowOutputData($todoObject);

        return $this->presenter->handle($data);
    }
}

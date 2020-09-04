<?php

namespace Package\Controllers\Todo;

use Package\UseCases\Repository\TodoRepository;
use Package\UseCases\Todo\Index\TodoIndexInput;
use Package\UseCases\Todo\Index\TodoIndexInputData;
use Package\UseCases\Todo\Index\TodoIndexOutput;
use Package\UseCases\Todo\Index\TodoIndexOutputData;
use Package\UseCases\Todo\TodoObject;

class TodoIndexController implements TodoIndexInput
{
    private $repository;
    private $presenter;

    public function __construct(TodoRepository $repository, TodoIndexOutput $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function handle(TodoIndexInputData $input)
    {
        $todos = $this->repository->findAll();

        $todoObjects = [];
        foreach ($todos as $todo){
            $todoObjects[] = new TodoObject(
                $todo->getId()->getValue(),
                $todo->getText()->getValue(),
                $todo->getDoneAt()->getValue(),
                $todo->getCreatedAt()->getValue(),
                $todo->getUpdatedAt()->getValue()
            );
        }

        $data = new TodoIndexOutputData($todoObjects);

        return $this->presenter->handle($data);
    }
}

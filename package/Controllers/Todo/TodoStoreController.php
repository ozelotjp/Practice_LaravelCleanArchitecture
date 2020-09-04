<?php

namespace Package\Controllers\Todo;

use Package\Entities\Model\Todo\Todo;
use Package\Entities\Model\Todo\TodoCreatedAt;
use Package\Entities\Model\Todo\TodoDoneAt;
use Package\Entities\Model\Todo\TodoId;
use Package\Entities\Model\Todo\TodoText;
use Package\Entities\Model\Todo\TodoUpdatedAt;
use Package\UseCases\Repository\TodoRepository;
use Package\UseCases\Todo\Store\TodoStoreInput;
use Package\UseCases\Todo\Store\TodoStoreInputData;
use Package\UseCases\Todo\Store\TodoStoreOutput;
use Package\UseCases\Todo\Store\TodoStoreOutputData;
use Package\UseCases\Todo\TodoObject;

class TodoStoreController implements TodoStoreInput
{
    private $repository;
    private $presenter;

    public function __construct(TodoRepository $repository, TodoStoreOutput $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function handle(TodoStoreInputData $input)
    {
        $id = uniqid();

        $todo = new Todo(
            new TodoId($id),
            new TodoText($input->text),
            new TodoDoneAt(null),
            new TodoCreatedAt(null),
            new TodoUpdatedAt(null)
        );
        $this->repository->save($todo);

        $todo = $this->repository->findById(new TodoId($id));
        $todoObject = new TodoObject(
            $todo->getId()->getValue(),
            $todo->getText()->getValue(),
            $todo->getDoneAt()->getValue(),
            $todo->getCreatedAt()->getValue(),
            $todo->getUpdatedAt()->getValue()
        );

        $data = new TodoStoreOutputData($todoObject);

        return $this->presenter->handle($data);
    }
}

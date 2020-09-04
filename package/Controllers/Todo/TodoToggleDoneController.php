<?php

namespace Package\Controllers\Todo;

use Carbon\Carbon;
use Package\Entities\Model\Todo\TodoDoneAt;
use Package\Entities\Model\Todo\TodoId;
use Package\UseCases\Repository\TodoRepository;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneInput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneInputData;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneOutput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneOutputData;

class TodoToggleDoneController implements TodoToggleDoneInput
{
    private $repository;
    private $presenter;

    public function __construct(TodoRepository $repository, TodoToggleDoneOutput $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function handle(TodoToggleDoneInputData $input)
    {
        $todo = $this->repository->findById(new TodoId($input->id));
        $doneAt = $todo->getDoneAt()->getValue();

        $result = $this->repository->updateDone(
            new TodoId($input->id),
            new TodoDoneAt($doneAt === null ? Carbon::now() : null)
        );

        $data = new TodoToggleDoneOutputData($result);

        return $this->presenter->handle($data);
    }
}

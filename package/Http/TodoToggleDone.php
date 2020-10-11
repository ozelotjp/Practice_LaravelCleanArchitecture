<?php

namespace Package\Http;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Package\Domain\Model\Todo\Todo;
use Package\Domain\Model\Todo\TodoDoneAt;
use Package\Domain\Model\Todo\TodoId;
use Package\UseCase\TodoGet\TodoGetInputData;
use Package\UseCase\TodoGet\TodoGetUseCase;
use Package\UseCase\TodoUpdate\TodoUpdateInputData;
use Package\UseCase\TodoUpdate\TodoUpdateUseCase;

class TodoToggleDone
{
    private Request $request;
    private TodoGetUseCase $todoGetUseCase;
    private TodoUpdateUseCase $todoUpdateUseCase;

    public function __construct(Request $request, TodoGetUseCase $todoGetAllUseCase, TodoUpdateUseCase $todoUpdateUseCase)
    {
        $this->request = $request;
        $this->todoGetUseCase = $todoGetAllUseCase;
        $this->todoUpdateUseCase = $todoUpdateUseCase;
    }

    public function execute()
    {
        $todoGetOutput = $this->todoGetUseCase->execute(new TodoGetInputData(
            new TodoId($this->request->route('id'))
        ));

        $todoUpdateOutput = $this->todoUpdateUseCase->execute(new TodoUpdateInputData(
            new Todo(
                $todoGetOutput->todo()->id(),
                $todoGetOutput->todo()->text(),
                new TodoDoneAt($todoGetOutput->todo()->isDone() ? null : Carbon::now()),
                $todoGetOutput->todo()->createdAt(),
                $todoGetOutput->todo()->updatedAt()
            )
        ));

        return redirect()->back();
    }
}

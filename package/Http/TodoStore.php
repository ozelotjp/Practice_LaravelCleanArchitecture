<?php

namespace Package\Http;

use Illuminate\Http\Request;
use Package\Domain\Model\Todo\TodoText;
use Package\UseCase\TodoCreate\TodoCreateInputData;
use Package\UseCase\TodoCreate\TodoCreateUseCase;

class TodoStore
{
    private Request $request;
    private TodoCreateUseCase $todoCreateUseCase;

    public function __construct(Request $request, TodoCreateUseCase $todoCreateUseCase)
    {
        $this->request = $request;
        $this->todoCreateUseCase = $todoCreateUseCase;
    }

    public function execute()
    {
        $todoCreateOutput = $this->todoCreateUseCase->execute(new TodoCreateInputData(
            new TodoText($this->request->get('text'))
        ));

        $id = $todoCreateOutput->todoId()->value();

        return redirect()->route('todo.show', compact('id'));
    }
}

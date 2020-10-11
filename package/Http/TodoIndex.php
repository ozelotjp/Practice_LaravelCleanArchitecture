<?php

namespace Package\Http;

use Illuminate\Http\Request;
use Package\UseCase\TodoGetAll\TodoGetAllInputData;
use Package\UseCase\TodoGetAll\TodoGetAllUseCase;
use Package\ViewModel\TodoViewModel;

class TodoIndex
{
    private Request $request;
    private TodoGetAllUseCase $todoGetAllUseCase;

    public function __construct(Request $request, TodoGetAllUseCase $todoGetAllUseCase)
    {
        $this->request = $request;
        $this->todoGetAllUseCase = $todoGetAllUseCase;
    }

    public function execute()
    {
        $todoGetAllOutput = $this->todoGetAllUseCase->execute(new TodoGetAllInputData());

        $todos = array_map(fn ($todo) => new TodoViewModel($todo), $todoGetAllOutput->todos());

        return view('todo.index')->with(compact('todos'));
    }
}

<?php

namespace Package\Http;

use Illuminate\Http\Request;
use Package\Domain\Exceptions\TodoNotFoundException;
use Package\Domain\Model\Todo\TodoId;
use Package\UseCase\TodoGet\TodoGetInputData;
use Package\UseCase\TodoGet\TodoGetUseCase;
use Package\ViewModel\TodoViewModel;

class TodoShow
{
    private Request $request;
    private TodoGetUseCase $todoGetUseCase;

    public function __construct(Request $request, TodoGetUseCase $todoGetUseCase)
    {
        $this->request = $request;
        $this->todoGetUseCase = $todoGetUseCase;
    }

    public function execute()
    {
        try {
            $todoGetOutput = $this->todoGetUseCase->execute(new TodoGetInputData(
                new TodoId($this->request->route('id'))
            ));

            $todo = new TodoViewModel($todoGetOutput->todo());

            return view('todo.show')->with(compact('todo'));
        } catch (TodoNotFoundException $exception) {
            return 'Todoが見つかりませんでした';
        }
    }
}

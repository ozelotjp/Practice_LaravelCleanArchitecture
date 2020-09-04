<?php

namespace Package\Presenters\Todo;

use App\Http\Middleware\CleanArchitectureMiddleware;
use Package\Presenters\ViewModel\TodoViewModel;
use Package\UseCases\Todo\Index\TodoIndexOutput;
use Package\UseCases\Todo\Index\TodoIndexOutputData;

class TodoIndexPresenter implements TodoIndexOutput
{
    private $middleware;

    public function __construct(CleanArchitectureMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

    public function handle(TodoIndexOutputData $output)
    {
        $todos = [];
        foreach ($output->todos as $todo){
            $todos[] = new TodoViewModel(
                $todo->id,
                $todo->text,
                $todo->done_at,
                $todo->created_at,
                $todo->updated_at
            );
        }

        $this->middleware->setData(view("todo.index", compact("todos")));
    }
}

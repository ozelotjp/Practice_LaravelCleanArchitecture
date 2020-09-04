<?php

namespace Package\Presenters\Todo;

use App\Http\Middleware\CleanArchitectureMiddleware;
use Package\Presenters\ViewModel\TodoViewModel;
use Package\UseCases\Todo\Show\TodoShowOutput;
use Package\UseCases\Todo\Show\TodoShowOutputData;

class TodoShowPresenter implements TodoShowOutput
{
    private $middleware;

    public function __construct(CleanArchitectureMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

    public function handle(TodoShowOutputData $output)
    {
        $todo = new TodoViewModel(
            $output->todo->id,
            $output->todo->text,
            $output->todo->done_at,
            $output->todo->created_at,
            $output->todo->updated_at
        );

        $this->middleware->setData(view("todo.show", compact("todo")));
    }
}

<?php

namespace Package\Presenters\Todo;

use App\Http\Middleware\CleanArchitectureMiddleware;
use Package\UseCases\Todo\Store\TodoStoreOutput;
use Package\UseCases\Todo\Store\TodoStoreOutputData;

class TodoStorePresenter implements TodoStoreOutput
{
    private $middleware;

    public function __construct(CleanArchitectureMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

    public function handle(TodoStoreOutputData $output)
    {
        $this->middleware->setData(redirect()->route("todo.show", ["id" => $output->todo->id]));
    }
}

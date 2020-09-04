<?php

namespace Package\Presenters\Todo;

use App\Http\Middleware\CleanArchitectureMiddleware;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneOutput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneOutputData;

class TodoToggleDonePresenter implements TodoToggleDoneOutput
{
    private $middleware;

    public function __construct(CleanArchitectureMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

    public function handle(TodoToggleDoneOutputData $output)
    {
        $this->middleware->setData(redirect()->back());
    }
}

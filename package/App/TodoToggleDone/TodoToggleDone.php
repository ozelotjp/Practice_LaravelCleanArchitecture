<?php

namespace Package\App\TodoToggleDone;

use Carbon\Carbon;
use Package\Domain\Todo\TodoDoneAt;
use Package\Infra\DB\TodoGateway;

class TodoToggleDone
{
    private $gateway;

    public function __construct(TodoGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoToggleDoneRequest $request): TodoToggleDoneResponse
    {
        $todo = $this->gateway->get($request->id());

        $doneAt = new TodoDoneAt($todo->doneAt()->value() === null ? Carbon::now() : null);

        $this->gateway->updateDoneAt($request->id(), $doneAt);

        return new TodoToggleDoneResponse($request->id());
    }
}

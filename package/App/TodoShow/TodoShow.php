<?php

namespace Package\App\TodoShow;

use Package\Infra\DB\TodoGateway;

class TodoShow
{
    private $gateway;

    public function __construct(TodoGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoShowRequest $request): TodoShowResponse
    {
        $todo = $this->gateway->get($request->id());

        return new TodoShowResponse($todo);
    }
}

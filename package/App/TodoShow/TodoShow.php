<?php

namespace Package\App\TodoShow;

use Package\Infra\TodoGatewayInterface;

class TodoShow
{
    private $gateway;

    public function __construct(TodoGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoShowRequest $request): TodoShowResponse
    {
        $todo = $this->gateway->get($request->id());

        return new TodoShowResponse($todo);
    }
}

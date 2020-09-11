<?php

namespace Package\App\TodoIndex;

use Package\Infra\TodoGatewayInterface;

class TodoIndex
{
    private $gateway;

    public function __construct(TodoGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoIndexRequest $request): TodoIndexResponse
    {
        $todos = $this->gateway->getAll();

        return new TodoIndexResponse($todos);
    }
}

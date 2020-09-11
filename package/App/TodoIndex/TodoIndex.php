<?php

namespace Package\App\TodoIndex;

use Package\Infra\DB\TodoGateway;

class TodoIndex
{
    private $gateway;

    public function __construct(TodoGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoIndexRequest $request): TodoIndexResponse
    {
        $todos = $this->gateway->getAll();

        return new TodoIndexResponse($todos);
    }
}

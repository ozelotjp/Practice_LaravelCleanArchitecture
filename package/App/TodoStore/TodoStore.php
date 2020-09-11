<?php

namespace Package\App\TodoStore;

use Package\Infra\TodoGatewayInterface;

class TodoStore
{
    private $gateway;

    public function __construct(TodoGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoStoreRequest $request): TodoStoreResponse
    {
        $id = $this->gateway->store($request->text());

        return new TodoStoreResponse($id);
    }
}

<?php

namespace Package\App\TodoStore;

use Package\Infra\DB\TodoGateway;

class TodoStore
{
    private $gateway;

    public function __construct(TodoGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TodoStoreRequest $request): TodoStoreResponse
    {
        $id = $this->gateway->store($request->text());

        return new TodoStoreResponse($id);
    }
}

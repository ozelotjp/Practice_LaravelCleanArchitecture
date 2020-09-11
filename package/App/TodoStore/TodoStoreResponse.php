<?php

namespace Package\App\TodoStore;

use Package\Domain\Todo\TodoId;

class TodoStoreResponse
{
    private $id;

    public function __construct(TodoId $id)
    {
        $this->id = $id;
    }

    public function id(): TodoId
    {
        return $this->id;
    }
}

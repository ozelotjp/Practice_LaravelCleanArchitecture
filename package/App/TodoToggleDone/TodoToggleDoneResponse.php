<?php

namespace Package\App\TodoToggleDone;

use Package\Domain\Todo\TodoId;

class TodoToggleDoneResponse
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

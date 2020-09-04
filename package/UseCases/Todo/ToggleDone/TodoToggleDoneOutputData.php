<?php

namespace Package\UseCases\Todo\ToggleDone;

class TodoToggleDoneOutputData
{
    public $result;

    public function __construct(bool $result)
    {
        $this->result = $result;
    }
}

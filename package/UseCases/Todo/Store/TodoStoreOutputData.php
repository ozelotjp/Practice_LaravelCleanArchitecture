<?php

namespace Package\UseCases\Todo\Store;

use Package\UseCases\Todo\TodoObject;

class TodoStoreOutputData
{
    public $todo;

    public function __construct(TodoObject $todo)
    {
        $this->todo = $todo;
    }
}

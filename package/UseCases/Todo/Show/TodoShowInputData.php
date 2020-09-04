<?php

namespace Package\UseCases\Todo\Show;

class TodoShowInputData
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

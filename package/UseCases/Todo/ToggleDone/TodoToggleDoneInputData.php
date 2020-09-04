<?php

namespace Package\UseCases\Todo\ToggleDone;

class TodoToggleDoneInputData
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

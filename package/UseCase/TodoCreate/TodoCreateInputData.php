<?php

namespace Package\UseCase\TodoCreate;

use Package\Domain\Model\Todo\TodoText;

class TodoCreateInputData implements TodoCreateInput
{
    private TodoText $text;

    public function __construct(TodoText $text)
    {
        $this->text = $text;
    }

    public function todoText(): TodoText
    {
        return $this->text;
    }
}

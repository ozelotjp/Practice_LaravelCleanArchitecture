<?php

namespace Package\ViewModel;

use Package\Domain\Todo\Todo;

class TodoViewModel
{
    public $id;
    public $text;
    public $doneAt;
    public $createdAt;
    public $updatedAt;

    public function __construct(Todo $todo)
    {
        $this->id = $todo->id()->value();
        $this->text = $todo->text()->value();
        $this->doneAt = $todo->doneAt()->value();
        $this->updatedAt = $todo->updatedAt()->value();
        $this->createdAt = $todo->createdAt()->value();
    }
}

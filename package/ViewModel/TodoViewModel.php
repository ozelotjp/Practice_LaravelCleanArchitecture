<?php

namespace Package\ViewModel;

use Carbon\Carbon;
use Package\Domain\Model\Todo\Todo;

class TodoViewModel
{
    public int $id;
    public string $text;
    public ?Carbon $doneAt;
    public ?Carbon $createdAt;
    public ?Carbon $updatedAt;

    public function __construct(Todo $todo)
    {
        if ($todo->id()->value() === null) {
            throw new \InvalidArgumentException();
        }

        $this->id = $todo->id()->value() ?? 0;
        $this->text = $todo->text()->value();
        $this->doneAt = $todo->doneAt()->value();
        $this->createdAt = $todo->createdAt()->value();
        $this->updatedAt = $todo->updatedAt()->value();
    }
}

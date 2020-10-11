<?php

namespace Package\Domain\Model\Todo;

class Todo
{
    private TodoId $id;
    private TodoText $text;
    private TodoDoneAt $doneAt;
    private TodoCreatedAt $createdAt;
    private TodoUpdatedAt $updatedAt;

    public function __construct(TodoId $id, TodoText $text, TodoDoneAt $doneAt, TodoCreatedAt $createdAt, TodoUpdatedAt $updatedAt)
    {
        $this->id = $id;
        $this->text = $text;
        $this->doneAt = $doneAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function id(): TodoId
    {
        return $this->id;
    }

    public function text(): TodoText
    {
        return $this->text;
    }

    public function doneAt(): TodoDoneAt
    {
        return $this->doneAt;
    }

    public function createdAt(): TodoCreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): TodoUpdatedAt
    {
        return $this->updatedAt;
    }

    public function isExist(): bool
    {
        return $this->id->value() !== null;
    }

    public function isDone(): bool
    {
        return $this->doneAt->value() !== null;
    }
}

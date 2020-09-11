<?php

namespace Package\Domain\Todo;

class Todo
{
    private $id;
    private $text;
    private $doneAt;
    private $createdAt;
    private $updatedAt;

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
}

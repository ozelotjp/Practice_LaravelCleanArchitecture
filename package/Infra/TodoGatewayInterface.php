<?php

namespace Package\Infra;

use Package\Domain\Todo\Todo;
use Package\Domain\Todo\TodoDoneAt;
use Package\Domain\Todo\TodoId;
use Package\Domain\Todo\TodoText;

interface TodoGatewayInterface
{
    public function getAll(): array;

    public function get(TodoId $id): Todo;

    public function store(TodoText $text): TodoId;

    public function updateDoneAt(TodoId $id, TodoDoneAt $doneAt): void;
}

<?php

namespace Package\Gateway;

use Package\Domain\Model\Todo\Todo;
use Package\Domain\Model\Todo\TodoId;

interface ITodoDatabase
{
    public function get(TodoId $id): Todo;

    /**
     * @return Todo[]
     */
    public function getAll(): array;

    public function create(Todo $todo): TodoId;

    public function update(Todo $todo): void;
}

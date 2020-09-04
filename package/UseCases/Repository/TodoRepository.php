<?php

namespace Package\UseCases\Repository;

use Package\Entities\Model\Todo\Todo;
use Package\Entities\Model\Todo\TodoDoneAt;
use Package\Entities\Model\Todo\TodoId;

interface TodoRepository
{
    /**
     * @return Todo[]
     */
    public function findAll(): array;

    public function findById(TodoId $id): Todo;

    public function save(Todo $todo): bool;

    public function updateDone(TodoId $id, TodoDoneAt $doneAt): bool;
}

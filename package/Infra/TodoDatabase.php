<?php

namespace Package\Infra;

use App\Models\TodoModel;
use Package\Domain\Exceptions\TodoNotFoundException;
use Package\Domain\Model\Todo\Todo;
use Package\Domain\Model\Todo\TodoCreatedAt;
use Package\Domain\Model\Todo\TodoDoneAt;
use Package\Domain\Model\Todo\TodoId;
use Package\Domain\Model\Todo\TodoText;
use Package\Domain\Model\Todo\TodoUpdatedAt;
use Package\Gateway\ITodoDatabase;

class TodoDatabase implements ITodoDatabase
{
    /**
     * @throws TodoNotFoundException
     */
    public function get(TodoId $id): Todo
    {
        $model = TodoModel::where('id', $id->value())->first();

        if ($model === null) {
            throw new TodoNotFoundException();
        }

        return $this->convertTodoModelToEntity($model);
    }

    /**
     * @return Todo[]
     */
    public function getAll(): array
    {
        $models = TodoModel::all();

        return $models->map(fn ($model) => $this->convertTodoModelToEntity($model))->toArray();
    }

    public function create(Todo $todo): TodoId
    {
        $model = new TodoModel();
        $model->id = $todo->id()->value();
        $model->text = $todo->text()->value();
        $model->done_at = $todo->doneAt()->value();
        $model->created_at = $todo->createdAt()->value();
        $model->updated_at = $todo->updatedAt()->value();

        $model->save();

        return new TodoId($model->id);
    }

    /**
     * @throws TodoNotFoundException
     */
    public function update(Todo $todo): void
    {
        $model = TodoModel::where('id', $todo->id()->value())->first();

        if ($model === null) {
            throw new TodoNotFoundException();
        }

        $model->text = $todo->text()->value();
        $model->done_at = $todo->doneAt()->value();
        $model->created_at = $todo->createdAt()->value();
        $model->updated_at = $todo->updatedAt()->value();

        $model->save();
    }

    private function convertTodoModelToEntity(TodoModel $model): Todo
    {
        return new Todo(
            new TodoId($model->id),
            new TodoText($model->text),
            new TodoDoneAt($model->done_at),
            new TodoCreatedAt($model->created_at),
            new TodoUpdatedAt($model->updated_at)
        );
    }
}

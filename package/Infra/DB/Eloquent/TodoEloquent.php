<?php

namespace Package\Infra\DB\Eloquent;

use App\Models\TodoModel;
use Package\Domain\Todo\Todo;
use Package\Domain\Todo\TodoCreatedAt;
use Package\Domain\Todo\TodoDoneAt;
use Package\Domain\Todo\TodoId;
use Package\Domain\Todo\TodoText;
use Package\Domain\Todo\TodoUpdatedAt;
use Package\Infra\DB\TodoGateway;

class TodoEloquent implements TodoGateway
{
    public function get(TodoId $id): Todo
    {
        $todoModel = TodoModel::findOrFail($id->value());

        return new Todo(
            new TodoId($todoModel->id),
            new TodoText($todoModel->text),
            new TodoDoneAt($todoModel->done_at),
            new TodoCreatedAt($todoModel->created_at),
            new TodoUpdatedAt($todoModel->updated_at)
        );
    }

    /**
     * @return Todo[]
     */
    public function getAll(): array
    {
        $todos = [];

        foreach (TodoModel::all() as $todoModel) {
            $todos[] = new Todo(
                new TodoId($todoModel->id),
                new TodoText($todoModel->text),
                new TodoDoneAt($todoModel->done_at),
                new TodoCreatedAt($todoModel->created_at),
                new TodoUpdatedAt($todoModel->updated_at)
            );
        }

        return $todos;
    }

    public function store(TodoText $text): TodoId
    {
        $todoModel = new TodoModel();
        $todoModel->text = $text->value();
        $todoModel->save();

        return new TodoId($todoModel->id);
    }

    public function updateDoneAt(TodoId $id, TodoDoneAt $doneAt): void
    {
        $todoModel = TodoModel::findOrFail($id->value());
        $todoModel->done_at = $doneAt->value();
        $todoModel->save();
    }
}

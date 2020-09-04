<?php

namespace Package\Gateways\Eloquent;

use App\Models\Todo as EloquentTodo;
use Carbon\Carbon;
use Package\Entities\Model\Todo\Todo;
use Package\Entities\Model\Todo\TodoCreatedAt;
use Package\Entities\Model\Todo\TodoDoneAt;
use Package\Entities\Model\Todo\TodoId;
use Package\Entities\Model\Todo\TodoText;
use Package\Entities\Model\Todo\TodoUpdatedAt;
use Package\UseCases\Repository\TodoRepository;

class TodoGateway implements TodoRepository
{
    /**
     * @return Todo[]
     */
    public function findAll(): array
    {
        $todos = [];

        $models = EloquentTodo::all();
        foreach($models as $model){
            $todos[] = new Todo(
                new TodoId($model->id),
                new TodoText($model->text),
                new TodoDoneAt($model->done_at),
                new TodoCreatedAt($model->created_at),
                new TodoUpdatedAt($model->updated_at)
            );
        }

        return $todos;
    }

    public function findById(TodoId $id): Todo
    {
        $model = EloquentTodo::where("id", $id->getValue())->first();

        if($model === null || !$model->exists()){
            throw new \RuntimeException();
        }

        return new Todo(
            new TodoId($model->id),
            new TodoText($model->text),
            new TodoDoneAt($model->done_at),
            new TodoCreatedAt($model->created_at),
            new TodoUpdatedAt($model->updated_at)
        );
    }

    public function save(Todo $todo): bool
    {
        $now = Carbon::now();
        return \DB::table("todos")->updateOrInsert(
            [
                "id" => $todo->getId()->getValue()
            ],
            [
                "text" => $todo->getText()->getValue(),
                "done_at" => $todo->getDoneAt()->getValue(),
                "created_at" => $todo->getCreatedAt()->getValue() ?? $now,
                "updated_at" => $now
            ]
        );
    }

    public function updateDone(TodoId $id, TodoDoneAt $doneAt): bool
    {
        return \DB::table("todos")
            ->where("id", $id->getValue())
            ->update(
                [
                    "done_at" => $doneAt->getValue(),
                    "updated_at" => Carbon::now()
                ]
            );
    }
}

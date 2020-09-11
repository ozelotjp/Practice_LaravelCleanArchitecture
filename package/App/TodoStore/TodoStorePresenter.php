<?php

namespace Package\App\TodoStore;

class TodoStorePresenter
{
    public function execute(TodoStoreResponse $output)
    {
        $id = $output->id()->value();

        return redirect(route('todo.show', compact('id')));
    }
}

<?php

namespace Package\App\TodoIndex;

use Package\ViewModel\TodoViewModel;

class TodoIndexPresenter
{
    public function execute(TodoIndexResponse $output)
    {
        $todos = [];
        foreach ($output->todos() as $todo) {
            $todos[] = new TodoViewModel($todo);
        }

        return view('todo.index')->with(compact('todos'));
    }
}

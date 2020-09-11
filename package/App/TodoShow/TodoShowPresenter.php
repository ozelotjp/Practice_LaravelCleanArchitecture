<?php

namespace Package\App\TodoShow;

use Package\ViewModel\TodoViewModel;

class TodoShowPresenter
{
    public function execute(TodoShowResponse $output)
    {
        $todo = new TodoViewModel($output->todo());

        return view('todo.show', ['id' => $todo->id])->with(compact('todo'));
    }
}

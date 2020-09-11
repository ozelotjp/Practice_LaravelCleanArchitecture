<?php

namespace Package\App\TodoToggleDone;

class TodoToggleDonePresenter
{
    public function execute(TodoToggleDoneResponse $output)
    {
        $id = $output->id()->value();

        return redirect(route('todo.show', compact('id')));
    }
}

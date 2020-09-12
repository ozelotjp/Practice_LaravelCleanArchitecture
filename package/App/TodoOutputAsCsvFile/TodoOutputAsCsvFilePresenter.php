<?php

namespace Package\App\TodoOutputAsCsvFile;

class TodoOutputAsCsvFilePresenter
{
    public function execute(TodoOutputAsCsvFileResponse $output)
    {
        $download = $output->url()->value();

        \Session::flash('download', $download);

        return redirect(route('todo.index'));
    }
}

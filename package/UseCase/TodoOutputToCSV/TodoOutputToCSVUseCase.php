<?php

namespace Package\UseCase\TodoOutputToCSV;

use Package\Gateway\ITodoFile;

class TodoOutputToCSVUseCase
{
    private ITodoFile $todoFile;

    public function __construct(ITodoFile $todoFile)
    {
        $this->todoFile = $todoFile;
    }

    public function execute(TodoOutputToCSVInput $input): TodoOutputToCSVOutput
    {
        $file = $this->todoFile->saveArrayToCSV($input->todos());

        return new TodoOutputToCSVOutputData($file);
    }
}

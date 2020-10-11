<?php

namespace Package\Http;

use Illuminate\Http\Request;
use Package\UseCase\TodoGetAll\TodoGetAllInputData;
use Package\UseCase\TodoGetAll\TodoGetAllUseCase;
use Package\UseCase\TodoOutputToCSV\TodoOutputToCSVInputData;
use Package\UseCase\TodoOutputToCSV\TodoOutputToCSVUseCase;

class TodoOutputAsCSVFile
{
    private Request $request;
    private TodoGetAllUseCase $todoGetAllUseCase;
    private TodoOutputToCSVUseCase $todoOutputToCSVUseCase;

    public function __construct(Request $request, TodoGetAllUseCase $todoGetAllUseCase, TodoOutputToCSVUseCase $todoOutputToCSVUseCase)
    {
        $this->request = $request;
        $this->todoGetAllUseCase = $todoGetAllUseCase;
        $this->todoOutputToCSVUseCase = $todoOutputToCSVUseCase;
    }

    public function execute()
    {
        $todoGetAllOutput = $this->todoGetAllUseCase->execute(new TodoGetAllInputData());

        $todoSaveToCSVOutput = $this->todoOutputToCSVUseCase->execute(new TodoOutputToCSVInputData(
            $todoGetAllOutput->todos()
        ));

        $file = $todoSaveToCSVOutput->file();

        \Session::flash('download', $file->url()->value());

        return redirect()->back();
    }
}

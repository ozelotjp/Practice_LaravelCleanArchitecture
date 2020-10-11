<?php

namespace Package\Infra;

use Carbon\Carbon;
use Package\Domain\Model\File\File;
use Package\Domain\Model\File\FilePath;
use Package\Domain\Model\File\FileUrl;
use Package\Domain\Model\Todo\Todo;
use Package\Gateway\ITodoFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv as CsvWriter;

class TodoFile implements ITodoFile
{
    /**
     * @param Todo[] $todos
     */
    public function saveArrayToCSV(array $todos): File
    {
        // Setup Data
        $header = ['ID', 'Text', 'DoneAt', 'CreatedAt', 'UpdatedAt'];
        $data = array_map(fn ($todo) => $this->convertTodoEntityToArray($todo), $todos);

        // Set Data to Spreadsheet
        $csv = new Spreadsheet();
        $csv->getActiveSheet()->fromArray([$header, ...$data]);

        // Setup Path
        $now = Carbon::now()->format('YmdHis');
        $pathDir = "public/download/{$now}";
        $pathFile = "{$now}.csv";
        $path = "{$pathDir}/{$pathFile}";

        // Save File
        \Storage::makeDirectory($pathDir);
        $writer = new CsvWriter($csv);
        $writer->setUseBOM(true);
        $writer->save(\Storage::path($path));

        return new File(
            new FilePath(\Storage::path($path)),
            new FileUrl(\Storage::url($path))
        );
    }

    private function convertTodoEntityToArray(Todo $todo): array
    {
        return [
            $todo->id()->value(),
            $todo->text()->value(),
            $todo->doneAt()->value(),
            $todo->createdAt()->value(),
            $todo->updatedAt()->value(),
        ];
    }
}

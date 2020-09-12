<?php

namespace Package\Infra\Storage;

use Carbon\Carbon;
use Package\Domain\Common\Url;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class CsvForTodoGateway
{
    public function save(array $header, array $todos): Url
    {
        $dir = 'public/download/'.Carbon::now()->format('YmdHis');
        $file = Carbon::now()->format('YmdHis').'.csv';
        \Storage::makeDirectory($dir);

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($header, null, 'A1');
        $sheet->fromArray($todos, null, 'A2');

        $writer = new Csv($spreadsheet);
        $writer->setUseBOM(true);
        $writer->save(\Storage::path($dir.'/'.$file));

        $url = \Storage::url($dir.'/'.$file);

        return new Url($url);
    }
}

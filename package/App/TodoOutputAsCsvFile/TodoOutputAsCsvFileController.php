<?php

namespace Package\App\TodoOutputAsCsvFile;

use Illuminate\Http\Request;

class TodoOutputAsCsvFileController implements TodoOutputAsCsvFileRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // no code
}

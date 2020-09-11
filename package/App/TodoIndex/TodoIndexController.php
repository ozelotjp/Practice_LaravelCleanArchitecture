<?php

namespace Package\App\TodoIndex;

use Illuminate\Http\Request;

class TodoIndexController implements TodoIndexRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // no code
}

<?php

namespace Package\App\TodoToggleDone;

use Illuminate\Http\Request;
use Package\Domain\Todo\TodoId;

class TodoToggleDoneController implements TodoToggleDoneRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function id(): TodoId
    {
        return new TodoId($this->request->route('id'));
    }
}

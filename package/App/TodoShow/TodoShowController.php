<?php

namespace Package\App\TodoShow;

use Illuminate\Http\Request;
use Package\Domain\Todo\TodoId;

class TodoShowController implements TodoShowRequest
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

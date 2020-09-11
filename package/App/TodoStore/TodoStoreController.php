<?php

namespace Package\App\TodoStore;

use Illuminate\Http\Request;
use Package\Domain\Todo\TodoText;

class TodoStoreController implements TodoStoreRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function text(): TodoText
    {
        return new TodoText($this->request->get('text'));
    }
}
